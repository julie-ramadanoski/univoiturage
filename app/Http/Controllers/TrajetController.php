<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //remplissage du tableau avec les données que l'itinéraire à défini
        $trajet['dateTraj']     = DateTime::createFromFormat('m/d/Y', $request->input('date'));
        $trajet['heureTraj']    = $request->input('goHour').":".$request->input('goMinute');
        //$trajet['autoRoutTraj'] = isset($request->input('highway'))?$request->input('highway'):false;
        $trajet['distTraj']     = $request->input('totalDistance');
        $trajet['dureeTraj']    = $request->input('totalDuree');
        $trajet['typeVehicule'] = $request->input('car');

        //récupération des données sur les etapes
        $insees     = $request->input('insees');
        $villes     = $request->input('villes');
        $distances  = $request->input('distances');
        $prices     = $request->input('prices'); //modified in the next form
        $durees     = $request->input('durees');

        $trajet['etapes'] = [];
        for($i=0; $i<count($villes); $i++){
            $trajet['etapes'][] = [
                'insee'     => $insees[$i],
                'ville'     => $villes[$i],
                'distance'  => $distances[$i],
                'price'     => $prices[$i],
                'duree'     => $durees[$i]
            ];
        }

        //stockage dans la session
        session(['trajet'=>$trajet]);

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
            'maxPlaces' => $trajet['typeVehicule']=="on"?8:1,
            'highway'   => $trajet['autoRoutTraj'],
            'distance'  => $trajet['distTraj'],
            'duree'     => $trajet['dureeTraj']
        ];

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
    public function creationTrajet(){
        //récupération de l'objet trajet et suppression de la session
        $trajet = $request->session()->pull('trajet');

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
        
        // !!!!!! Vérifier que la ville avec cet insee n'existe deja pas
        //création des étapes et etapes trajet
        for($i = 0; $i<count($trajet['etapes']); $i++){
            $etape = Etape::create([
                'adresseEtape'  => $trajet['etapes'][$i]['ville'],
                'inseeVille'    => $trajet['etapes'][$i]['insee']
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

        //redirection vers ce trajet
        return redirect()->route('showTrajet', ['id' => $trajet->idTraj]);

    }


    /* Fonction d'affichage de la page d'ajout de trajet : itinéraire */
    /*
    public function getView(){
        return view('trajet.ajout');
    }*/

    /* Fonction d'affichage de la page d'ajout de trajet */
    /*
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
    }*/
    /*
    public function addTrajet(Request $request){
        $itineraire = $request->session()->pull('itineraire');
        $ligneSteps = $request->session()->pull('ligneSteps');
        $details = $request->session()->pull('details');

        dd($itineraire, $ligneSteps, $details);

        $listeInsee = ""; //TODO
        $listeDist = "";  //TODO

        $date = DateTime::createFromFormat('m/d/Y', $itineraire['goDate']);

        //Création du trajet
        $trajet =  Trajet::create([
            'dateTraj' => $date, //Creer une date
            'heureTraj' => $itineraire['goHour'].":".$itineraire['goMinute'],
            'nbPlacesTraj' => $details['availablePlaces'],
            'tarifTraj'=>$details['totalPrice'],
            'autoRoutTraj'=>isset($itineraire["highway"])?$itineraire["highway"]:false,
            'detoursTraj'=>$details['detours'],
            'depaDecTraj'=>$details['retard'],
            'bagageTraj'=>$details["bagages"],
            'infoTraj'=>$details["description"],
            'distTraj'=>$request->session()->get('totalDistance'),
            'dureeTraj'=>$details['duree'],
            'idMemb'=>Auth::check()?Auth::user()->id:1, //TODO
            'idVeh'=>1, //TODO
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

        $etapeTrajet = EtapeTrajet::create([
            'idEtape'=> $etape->idEtape,
            'idTraj'=> $trajet->idTraj,
            'numOrdreEtapeTrajet' => 1,
            'distEtapeTrajet' => 0,
            'prixEtapeTrajet' => 0,
            'dureeEtapeTrajet' => 0,
            'placePrisesEtapeTrajet' => 0
        ]);

        $etapeTrajet->save();

        //Création des étapes & etapeTrajet associées
        for($i=0; $i < count($ligneSteps); $i++){
            $etape = Etape::create([
                'adresseEtape'=>$ligneSteps[$i]["to"],
                'inseeVille'=>Ville::where("nomVille",$ligneSteps[$i]["to"])->first()->inseeVille
            ]);

            $etape->save();

            $etapeTrajet = EtapeTrajet::create([
                'idEtape'=> $etape->idEtape,
                'idTraj'=> $trajet->idTraj,
                'numOrdreEtapeTrajet' => $i+2,
                'distEtapeTrajet' => $ligneSteps[$i]['distance'],
                'prixEtapeTrajet' => $ligneSteps[$i]['price'],
                'dureeEtapeTrajet' => 0, //TODO
                'placePrisesEtapeTrajet' => 0
            ]);

            $etapeTrajet->save();
        }

        return redirect()->route('showTrajet', ['id' => $trajet->idTraj]);
    }*/

    /* Fonction de traitement d'ajout de trajet */
    public function show($id){
        $trajet = Trajet::where('idTraj',$id)->get()->first();
        $etapeTrajet = EtapeTrajet::where('idTraj',$id)->get();
        $conducteur = User::where('id',$trajet->idMemb)->get()->first();
        dd($trajet, $etapeTrajet, $conducteur);
    }
}
