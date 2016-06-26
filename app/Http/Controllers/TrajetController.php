<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
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
        
        dd($request);

        //create insee list and dist list
        $insees = [Ville::where("nomVille",$request->input('startCity'))->first()->inseeVille];
        $adresses = $request->input('stepAdress');
        $cps      = $request->input('stepsCP');
        $villes   = $request->input('stepsCity');
        $c = count($villes);
        for($i=0; $i<$c; $i++){
            $insees[] = Ville::where("nomVille",$villes[i])->first()->inseeVille;
        }
        $insees[] = Ville::where("nomVille",$request->input('endCity'))->first()->inseeVille;
        $dists = [0,0];

        // creating the travel, using a private method and the request object
        $trajetO = $this->createTravelFromRequest($request, $insees, $dists);

        $slugs = ['start', 'step1', 'step2', 'step3', 'step4', 'end'];
        $count = count($slugs);
        for($i=0, $order=0; $i<$count; $i++){
            if($request->input($slugs[$i].'City') != ""){
                $step = $this->createStepFromRequest($request, $slugs[$i], $insees[$i]);
                $stepTravel= $this->createStepTravelFromRequest($trajetO->idTraj, $dists[$i], $prices[$i], $durations[$i], $order++);
            }
        }

        //show us 
        return redirect()->route('detailRecherche', ['id' => $trajetO->idTraj]);
    }

    private function createInseeListFromRequest(){

    }

    private function createTravelFromRequest($request, $insees, $dists){
        $travel =  Trajet::create([
            'dateTraj'      => \DateTime::createFromFormat('d/m/Y', $request->input('date')),
            'heureTraj'     => $request->input('hour').":".$request->input('minute'),
            'nbPlacesTraj'  => $request->input('place') || 1,
            'tarifTraj'     => $request->input('totalPrice') || 0,
            'autoRoutTraj'  => is_null($request->input('highway'))?false:true,
            'detoursTraj'   => $request->input('detour') || 0,
            'depaDecTraj'   => $request->input('late') || 0,
            'bagageTraj'    => $request->input('luggage') || 0,
            'infoTraj'      => $request->input('infos') || "No infos for this travel",
            'distTraj'      => $request->input('totalDistance') || 0,
            'dureeTraj'     => $request->input('totalDuree') || 0,
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

    private function createStepTravelFromRequest($travelId, $dist, $price, $duration, $order){
        $stepTravel = EtapeTrajet::create([
            'idEtape'   => $step->idEtape,
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
}
