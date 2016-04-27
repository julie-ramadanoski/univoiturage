<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Inscrit;
use App\Trajet;
use App\Etape;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;

use Validator;

use DateTime;

class InscriptionController extends Controller
{
    public function reserver(Request $request, $idTraj){
        $membId = Auth::user()->id;
        $idDep = $request->idDep;
        $idArr = $request->idArr;
        $inseeDep = Etape::find($idDep)->ville->inseeVille;
        $inseeArr = Etape::find($idArr)->ville->inseeVille;
        
        $listeInseeEtapeTrajet = Trajet::find($idTraj)->listeInseeEtapeTrajet;
        $listsplit = explode("/", $listeInseeEtapeTrajet);


        if($idDep == $idArr){
            $message = "Vous ne pouvez pas partir et arriver au même endroit.";
        }
        else if(array_search($inseeDep, $listsplit) > array_search($inseeArr, $listsplit)){
            $message = "Le trajet va dans l'autre sens.";
        }
        else{
            try {
                DB::table('inscrit')
                    ->insert(array("idMemb"=>$membId, "idTraj"=>$idTraj, "idEtapeDepartInscrit"=>$idDep, "idEtapeArriveeInscrit"=>$idArr));
                $message = "Inscription effectuée";
            } catch (\Illuminate\Database\QueryException $e) {
                $message = $e;
            }
        }
        $trajet = new Trajet;
        $trajet = $trajet->with('user', 'vehicule', 'etapetrajets.etape.ville', 'inscrits', 'questions')
                         ->where('idTraj', $idTraj)
                         ->first();
        $query = "SELECT distinct a.avisCInscrit ,a.commentaireCInscrit, a.dateCommentCInscrit FROM inscrit a, trajet b, users c WHERE a.idTraj = b.idTraj and b.idMemb = :idmemb order by a.dateCommentCInscrit DESC";
        $dernierAviss = DB::select( DB::raw($query), array(
                    'idmemb' => $trajet->user->id
        ));
        $dernierAvis = $dernierAviss[0];
        return view('recherche.detail',compact('trajet', 'dernierAvis', "message"));
    }

    public function accepter($idTrajet, $idMemb){
        $query = "UPDATE inscrit set valideInscrit = :valideInscrit where idTraj = :idTraj and idMemb = :idMemb";
        $results = DB::select( DB::raw($query), array(
                    'valideInscrit' => 1,
                    'idTraj' => $idTrajet,
                    'idMemb' => $idMemb
                ) );
        $trajets = Auth::user()->trajets; 
        $now = time();
        $message = "Proposition acceptée";
        return view('vosTrajets', compact('trajets', 'now', 'message'));
    }

    public function refuser($idTrajet, $idMemb){
        $query = "UPDATE inscrit set valideInscrit = :valideInscrit where idTraj = :idTraj and idMemb = :idMemb";
        $results = DB::select( DB::raw($query), array(
                    'valideInscrit' => 2,
                    'idTraj' => $idTrajet,
                    'idMemb' => $idMemb
                ) );
        $trajets = Auth::user()->trajets; 
        $now = time();
        $message = "Proposition refusée";
        return view('vosTrajets', compact('trajets', 'now', 'message'));
    }

    public function annuler($idTrajet, $idMemb){
        $query = "UPDATE inscrit set valideInscrit = :valideInscrit where idTraj = :idTraj and idMemb = :idMemb";
        $results = DB::select( DB::raw($query), array(
                    'valideInscrit' => 2,
                    'idTraj' => $idTrajet,
                    'idMemb' => $idMemb
                ) );
        $now = time();
        $reservations = Auth::user()->inscrits;
        $trajets = [];
        foreach ($reservations as $reservation) {
            $trajets[] = $reservation->trajet;
        }
        $message = "Reservation annulée";
        return view('historique_trajet', compact('trajets', 'reservations', 'message', 'now'));
    }
}
