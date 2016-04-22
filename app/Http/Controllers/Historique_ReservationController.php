<?php

namespace App\Http\Controllers;

use App\User;
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
        $reservations = Auth::user()->inscrits;
        $trajets = [];
        foreach ($reservations as $reservation) {
            $trajets[] = $reservation->trajet;
        }
        // dd($trajets);
        return view('historique_trajet', compact('trajets', 'reservations'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->prenomMemb = $request->input('prenomMemb');
        $user->email = $request->input('email');
        $user->telMobMemb = $request->input('telMobMemb');
        $user->anNaisMemb = $request->input('anNaisMemb');
        $user->prefMemb = $request->input('prefMemb');
        $user->photoMemb = $request->input('urlphoto');
        // $user->password = bcrypt(bcrypt($request->input['password']));
        $user->save();
        // dd($user);
        
        $columnSizes = [
                  'sm' => [4, 8],
                  'lg' => [2, 10]
                ];

        return view('profil.form', compact('columnSizes')); 
    }
}
