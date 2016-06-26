<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon;
use App\Http\Requests;
use App\Trajet;
use App\Etape;
use App\User;
use App\Vehicule;
use App\Ville;
use App\Etapetrajet;
use Auth;
use App\Http\Controllers\Controller;
use DateTime;

class TrajetController extends Controller
{
    /* renvoie la vue qui sert à définir l'itinéraire de l'utilisateur */
    public function getItineraire(){
        $userId = Auth::user()->id;
        $vehicule = Vehicule::where('idMemb',$userId)->get();
        return view('trajet.itineraire', ['id' => $vehicule]);
    }

    /* traitement des données de l'itinéraire */
    public function postItineraire(Request $request){
        
        //dd($request);
        $dists = $request->input('dists');
        $prices = $request->input('prices');
        $durations = $request->input('durations');

        //create insee list
        $insees = self::createInseeListFromRequest($request);

        // creating the travel, using a private method and the request object
        $trajetO = $this->createTravelFromRequest($request, $insees, $dists);

        $slugs = ['start', 'step1', 'step2', 'step3', 'step4', 'end'];
        $count = count($slugs);
        for($i=0, $order=0; $i<$count; $i++){
            if($request->input($slugs[$i].'City') != null){
                $step = $this->createStepFromRequest($request, $slugs[$i], $insees[$order]);
                $stepTravel= $this->createStepTravelFromRequest($trajetO->idTraj, $step->idEtape, $dists[$order], $prices[$order], $durations[$order], $order++);
            }
        }

        //show us 
        return redirect()->route('detailRecherche', ['id' => $trajetO->idTraj]);
    }

    private function createInseeListFromRequest($request){
        $insees = []; 
        $slugs = ['start', 'step1', 'step2', 'step3', 'step4', 'end'];
        $count = count($slugs);
        for($i=0; $i<$count; $i++){
            if($request->input($slugs[$i].'City') != ""){
                $city = Ville::where("nomVille",$request->input($slugs[$i].'City'))->first();
                if($city == null){
                    //search in WEB : http://public.opendatasoft.com/api/records/1.0/search/?dataset=correspondance-code-insee-code-postal&q=Marseille&rows=1
                    $newCity =  Ville::create([
                        'codePostalVille' => "00000",
                        'nomVille'         => $request->input($slugs[$i].'City')
                    ]);
                    $newCity->save();
                    $insees[] = $newCity->inseeVille;
                } else {
                    $insees[] = $city->inseeVille;
                }
            }
        }
        return $insees;
    }

    private function createTravelFromRequest($request, $insees, $dists){
        $travel =  Trajet::create([
            'dateTraj'      => date('Y/m/d',strtotime($request->input('date'))),
            'heureTraj'     => $request->input('hour').":".$request->input('minute'),
            'nbPlacesTraj'  => $request->input('place'),
            'tarifTraj'     => $request->input('totalPrice'),
            'autoRoutTraj'  => $request->input('highway') == "no"?false:true,
            'detoursTraj'   => $request->input('detour'),
            'depaDecTraj'   => $request->input('late'),
            'bagageTraj'    => $request->input('luggage'),
            'infoTraj'      => $request->input('infos') || "No infos for this travel",
            'distTraj'      => $request->input('totalDistance'),
            'dureeTraj'     => $request->input('totalDuree'),
            'idMemb'        => Auth::user()->id, 
            'idVeh'         => $request->input('usedCar') == "-1" ? null : $request->input('usedCar'),
            'listeInseeEtapeTrajet' =>join("/",$insees),
            'listeDistEtapeTrajet'  =>join("/",$dists)
        ]);
        $travel->save();
        return $travel;
    }

    private function createStepFromRequest($request, $slug, $insee){
        $step = Etape::create([
            'adresseEtape'  => $request->input($slug.'Adress'),
            'inseeVille'    => $insee
        ]);
        $step->save();
        return $step;
    }

    private function createStepTravelFromRequest($travelId, $stepId, $dist, $price, $duration, $order){
        $stepTravel = EtapeTrajet::create([
            'idEtape'   => $stepId,
            'idTraj'    => $travelId,
            'numOrdreEtapeTrajet'   => $order,
            'distEtapeTrajet'       => $dist,
            'prixEtapeTrajet'       => $price,
            'dureeEtapeTrajet'      => $duration,
            'placePrisesEtapeTrajet' => 0
        ]);
        $stepTravel->save();
        return $stepTravel;
    }

    /* Fonction de traitement d'ajout de trajet */
    public function show($id){
        $trajet = Trajet::where('idTraj',$id)->get()->first();
        $etapeTrajet = EtapeTrajet::where('idTraj',$id)->get();
        $conducteur = User::where('id',$trajet->idMemb)->get()->first();
        dd($trajet, $etapeTrajet, $conducteur);
    }

    public function vosTrajet(){
        $trajets = Auth::user()->trajets; 
        $now = time();
        return view('vosTrajets', compact('trajets', 'now'));
    }

    public function note(Request $request){
        $idMemb = $request->idMemb;
        $trajets = Auth::user()->trajets; 
        $now = time();
        $date = date("Y-m-d", $now);
        DB::table("inscrit")
                    ->whereRaw("idTraj = ".$request->idTraj." and idMemb = $idMemb")
                    ->update(array('avisVInscrit'=>$request->input('avisCInscrit'), 'commentaireVInscrit'=>$request->input('commentaireCInscrit'), 'dateCommentVInscrit' => $date));


        $message = "Avis attribué.";
         return view('vosTrajets', compact('trajets', 'now', 'message'));
    }

    public function annuler($idTraj){
        $trajet = Trajet::where('idTraj',$idTraj)->get()->first();
        $etapeTrajet = EtapeTrajet::where('idTraj',$idTraj)->get();
        $inscrits = $trajet->inscrits;
        foreach ($inscrits as $inscrit) {
            DB::table("inscrit")
                    ->whereRaw("idTraj = ".$idTraj)
                    ->delete();
        }
        foreach ($etapeTrajet as $etapeTraj) {
            DB::table("etapetrajet")
                    ->whereRaw("idTraj = ".$idTraj)
                    ->delete();
        }
        $trajet->delete();
        $trajets = Auth::user()->trajets; 
        $now = time();
        $message = "Trajet supprimé.";
        return view('vosTrajets', compact('trajets', 'now', 'message'));
    }
}
