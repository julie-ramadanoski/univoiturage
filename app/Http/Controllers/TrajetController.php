<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Trajet;
use App\Etape;
use App\User;
use App\Ville;
use App\EtapeTrajet;
use Auth;
use App\Http\Controllers\Controller;
use DateTime;

class TrajetController extends Controller
{
    /* renvoie la vue qui sert à définir l'itinéraire de l'utilisateur */
    public function getItineraire(){
        return view('trajet.itineraire');
    }

    /* traitement des données de l'itinéraire */
    public function postItineraire(Request $request){
        //création de l'objet trajet (tableau associatif)
        $trajet = [];

        $highway = is_null($request->input('highway'))?false:true;
        //remplissage du tableau avec les données que l'itinéraire à défini
        $trajet['dateTraj']     = \DateTime::createFromFormat('m/d/Y', $request->input('goDate'));
        //$trajet['dateTraj']     = \DateTime::createFromFormat('Y-m-d', $request->input('goDate'));
        $trajet['heureTraj']    = $request->input('goHour').":".$request->input('goMinute');
        $trajet['autoRoutTraj'] = $highway;
        $trajet['distTraj']     = $request->input('totalDistance');
        $trajet['dureeTraj']    = $request->input('totalDuree');
        $trajet['prixTraj']     = $request->input('totalPrice');
        $trajet['typeVehicule'] = $request->input('car');

        //récupération des données sur les etapes
        //$insees     = $request->input('insees');
        $villes     = $request->input('villes');
        $distances  = $request->input('distances');
        $prices     = $request->input('prices'); //modified in the next form
        $durees     = $request->input('durees');

        $trajet['etapes'] = [];
        for($i=0; $i<count($villes); $i++){
            if(strlen($villes[$i]) > 0){
                $trajet['etapes'][] = [
                    //'insee'     => $insees[$i],
                    'ville'     => $villes[$i],
                    'distance'  => $distances[$i],
                    'price'     => $prices[$i],
                    'duree'     => $durees[$i]
                ];
            }
        }

        //stockage dans la session
        session(['trajet'=>$trajet]);

        //dd($trajet);

        //retourne la vue des détails
        return redirect()->route('detailsG');
    }

    /* renvoie la vue qui sert à définir les détails de l'itinéraire de l'utilisateur */
    public function getDetails(Request $request){
        //récupération de l'objet trajet
        $trajet = $request->session()->get('trajet');

        //création de l'objet à donné à la vue
        $ligneSteps = [];

        for($i = 1; $i < count($trajet['etapes']); $i++){
            $from       = $trajet['etapes'][$i-1]['ville'];
            $to         = $trajet['etapes'][$i]['ville'];
            $price      = $trajet['etapes'][$i]['price'];
            $distance   = $trajet['etapes'][$i]['distance'];

            $ligneSteps[] = ["from"=>$from, "to"=>$to, "price"=>$price, "distance"=>$distance];
        }

        //données supplémentaires
        $datas =  [
            'date'      => $trajet['dateTraj'],
            'maxPlaces' => $trajet['typeVehicule']=="on"?8:1,
            'highway'   => $trajet['autoRoutTraj'],
            'distance'  => $trajet['distTraj'],
            'duree'     => $trajet['dureeTraj'],
            'prix'      => $trajet['prixTraj']
        ];

        //dd($ligneSteps, $datas);

        //rendu de la vue
        return view('trajet.details',compact("datas","ligneSteps"));
    }

    /* traitement des données des détails */
    public function postDetails(Request $request){
        //récupération de l'objet trajet
        $trajet = $request->session()->pull('trajet');

        //remplissage du trajet avec les données supplémentaires
        $trajet['nbPlacesTraj'] = $request->input('availablePlaces');
        $trajet['tarifTraj']    = $request->input('totalPrice');
        $trajet['detoursTraj']  = $request->input('detours');
        $trajet['depaDecTraj']  = $request->input('retard');
        $trajet['bagageTraj']   = $request->input('bagages');
        $trajet['infoTraj']     = $request->input('description');

        //maj des prix
        $prices = $request->input('price');
        for($i=0; $i<count($prices); $i++){
            $trajet['etapes'][$i+1]['price'] = $prices[$i];
        }

        //sauvegarde dans la session
        session(['trajet'=>$trajet]);
        //redirection vers le traitement
        return redirect()->route('creationTrajet');
    }

    /* stockage des données dans la base de données */
    /* NORMALEMENT, l'utilisateur est connecté arrivé ici */
    public function creationTrajet(Request $request){

        //récupération de l'objet trajet et suppression de la session
        $trajet = $request->session()->get('trajet');

        //récupération de l'id de l'utilisateur courant
        $idUser = Auth::check()?Auth::user()->id:-1;
        if($idUser == -1){throw new Exception("Vous n'êtes pas authentifié");}

        //création du trajet
        $trajetO =  Trajet::create([
            'dateTraj'      => $trajet['dateTraj'],
            'heureTraj'     => $trajet['heureTraj'],
            'nbPlacesTraj'  => $trajet['nbPlacesTraj'],
            'tarifTraj'     => $trajet['tarifTraj'],
            'autoRoutTraj'  => $trajet['autoRoutTraj'],
            'detoursTraj'   => $trajet['detoursTraj'],
            'depaDecTraj'   => $trajet['depaDecTraj'],
            'bagageTraj'    => $trajet['bagageTraj'],
            'infoTraj'      => $trajet['infoTraj'],
            'distTraj'      => $trajet['distTraj'],
            'dureeTraj'     => $trajet['dureeTraj'],
            'idMemb'        => $idUser, 
            'idVeh'         => 1, //TODO
            'listeInseeEtapeTrajet' =>"", //TODO
            'listeDistEtapeTrajet'  =>""  //TODO
        ]);

        $trajetO->save();
      
        //création des étapes et etapes trajet
        $inseeL = "";
        for($i = 0; $i<count($trajet['etapes']); $i++){
            $insee = 0;
            try{
                $insee = Ville::where("nomVille",$trajet['etapes'][$i]['ville'])->first()->inseeVille;
                $inseeL .= $insee."/";
            }
            catch(\Exception $e){
                // la ville n'existe pas dans la bdd
                // on utilisera la ville avec l'insee 0
            }

            $etape = Etape::create([
                'adresseEtape'  => $trajet['etapes'][$i]['ville'],
                'inseeVille'    => $insee
            ]);
            $etape->save();

            $etapeTrajet = EtapeTrajet::create([
                'idEtape'   => $etape->idEtape,
                'idTraj'    => $trajetO->idTraj,
                'numOrdreEtapeTrajet'   => $i+1,
                'distEtapeTrajet'       => $trajet['etapes'][$i]['distance'],
                'prixEtapeTrajet'       => $trajet['etapes'][$i]['price'],
                'dureeEtapeTrajet'      => $trajet['etapes'][$i]['duree'],
                'placePrisesEtapeTrajet' => 0
            ]);
            $etapeTrajet->save();
        }

        //enlever le dernier
        $inseeL = substr($inseeL,0,-1);
        $trajetO->listeInseeEtapeTrajet = $inseeL;
        $trajetO->save();

        // redirection vers ce trajet
        return redirect()->route('detailRecherche', ['id' => $trajetO->idTraj]);

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
