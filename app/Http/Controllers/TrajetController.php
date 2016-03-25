<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Trajet;
use App\Etape;
use App\Ville;
use App\EtapeTrajet;
use Auth;
use App\Http\Controllers\Controller;

class TrajetController extends Controller
{
    /* Fonction d'affichage de la page d'ajout de trajet : itinéraire */
    public function getView(){
        return view('trajet.ajout');
    }

    /* Fonction d'affichage de la page d'ajout de trajet */
    public function getView2(Request $request){
        //récupération des données de POST
        $data = $request->all();

        //Stockage dans la session pour le prochain traitement
        session(['itineraire'=>$data]);
        //Création d'un tableau d'étapes
        $steps = array($data["from"]);
        if(isset($data["steps"])){
            $steps = array_merge($steps,$data["steps"]);
        }
        $steps[] = $data["to"];

        //Création des lignes spéciales pour la vue
        $ligneSteps = [];
        $totalPrice = 0;
        $totalDistance = 0;
        for($i = 0; $i < count($steps) -1 ; $i++){
            $from = $steps[$i];
            $to = $steps[$i+1];
            $price = floor($data["distance"][$i] * 0.04);
            $totalPrice += $price;
            $totalDistance += $data["distance"][$i];
            $ligneSteps[] = ["from"=>$from, "to"=>$to, "price"=>$price, "distance"=>$data["distance"][$i]];
        }
        $tmp = array($totalPrice);

        session(['ligneSteps'=>$ligneSteps]);
        session(['totalDistance'=>$totalDistance]);
        return view('trajet.details',compact("data","ligneSteps","tmp"));
    }

    public function addTrajet(Request $request){
        //Récupération des données (formulaire + session)
        $itineraire = $request->session()->get('itineraire');
        $details = $request->all();
        $ligneSteps = $request->session()->get('ligneSteps');
        $listeInsee = ""; //TODO
        $listeDist = ""; //TODO

        //Création du trajet
        $trajet =  Trajet::create([
            'dateTraj' => $itineraire['goDate'], //Creer une date
            'heureTraj' => $itineraire['goHour'].":".$itineraire['goMinute'],
            'nbPlacesTraj' => $details['availablePlaces'],
            'tarifTraj'=>$details['totalPrice'],
            'autoRoutTraj'=>isset($itineraire["highway"])?$itineraire["highway"]:false,
            'detoursTraj'=>0, //TODO
            'depaDecTraj'=>0, //TODO
            'bagageTraj'=>"petits", //TODO
            'infoTraj'=>$details["description"],
            'distTraj'=>$request->session()->get('totalDistance'),
            'dureeTraj'=>0, //TODO
            'idMemb'=>Auth::check()?Auth::user()->id:1,
            'idVeh'=>1,
            'listeInseeEtapeTrajet'=>$listeInsee,
            'listeDistEtapeTrajet'=>$listeDist
        ]);
        $trajet->save();

        //Création de la première étape et etapeTrajet
        $etape = Etape::create([
            'adresseEtape'=>$ligneSteps[0]["from"],
            'inseeVille'=>Ville::where("nomVille",$ligneSteps[0]["from"])->first()->inseeVille
        ]);
        $etape->save();

        dd($etape);

        $etapeTrajet = EtapeTrajet::create([
            'idEtape'=> $etape->idEtape,
            'idTraj'=> $trajet->idTraj,
            'numOrdreEtapeTrajet' => 0,
            'distEtapeTrajet' => 0,
            'prixEtapeTrajet' => 0,
            'dureeEtapeTrajet' => 0,
            'placePrisesEtapeTrajet' => 0
        ]);

        $etapeTrajet->save();

        //Création des étapes & etapeTrajet associées
        for($i; $i < count($ligneSteps); $i++){
            $etape = Etape::create([
                'adresseEtape'=>$ligneSteps[$i]["to"],
                'inseeVille'=>Ville::where("nomVille",$ligneSteps[$i]["to"])->first()->inseeVille
            ]);

            $etape->save();

            $etapeTrajet = EtapeTrajet::create([
                'idEtape'=> $etape->idEtape,
                'idTraj'=> $trajet->idTraj,
                'numOrdreEtapeTrajet' => $i+1,
                'distEtapeTrajet' => $ligneSteps[$i]['distance'],
                'prixEtapeTrajet' => $ligneSteps[$i]['price'],
                'dureeEtapeTrajet' => 0, //TODO
                'placePrisesEtapeTrajet' => 0
            ]);

            $etapeTrajet->save();
        }
    }

    /* Fonction de traitement d'ajout de trajet */
    public function traitementAjoutTrajet(){
    	/*récupération de l'utilisateur connecté*/

    	/*récupération des données sur la voiture*/

    	/*récupération des données générales du trajet*/

    	/*récupération des données sur les étapes*/
    }
}
