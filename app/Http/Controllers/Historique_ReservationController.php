<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Inscrit;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;

use Validator;

use DateTime;

class Historique_ReservationController extends Controller
{
    public function show(Request $request)
    {
        $now = time();
        $reservations = Auth::user()->inscrits;
        $trajets = [];
        foreach ($reservations as $reservation) {
            $trajets[] = $reservation->trajet;
        }
        // dd($trajets);
        return view('historique_trajet', compact('trajets', 'reservations', 'now'));
    }

    public function note(Request $request){
        $now = time();
        $idMemb = Auth::user()->id;
        $reservations = Auth::user()->inscrits;
        $trajets = [];
        foreach ($reservations as $reservation) {
            $trajets[] = $reservation->trajet;
        }
        $query = "UPDATE inscrit set avisCInscrit = :avisCInscrit, commentaireCInscrit = :commentaireCInscrit,  dateCommentCInscrit = CAST(NOW() AS DATE) where idTraj = :idTraj and idMemb = :idMemb";
        $results = DB::select( DB::raw($query), array(
                    'avisCInscrit'     => $request->input('avisCInscrit'),
                    'commentaireCInscrit'  => $request->input('commentaireCInscrit'),
                    'idTraj' => $request->idTraj,
                    'idMemb'       => $idMemb
                ) );


        $message = "Avis attribué.";
         return view('historique_trajet', compact('trajets', 'reservations', 'message', 'now'));
    }
}
