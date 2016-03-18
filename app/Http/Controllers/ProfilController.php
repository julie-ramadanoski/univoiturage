<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;

use Validator;

use App\Trajet;
use DateTime;

class ProfilController extends Controller
{
    public function show(Request $request)
    {
        // Double validation du formulaire
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',
            'telMobMemb'=>'required|numeric|min:8',
            'anNaisMemb'=> 'requited|numeric',
            'site'=>'required',
            'sexeMemb'=>'required'
        ]);
        $user = $request->session();
        dd($user);
        $user->fill(\Input::all());

        // $data = $request->session()->all();

        // if ($validator->fails()) {

        //     // get the error messages from the validator
        //     $messages = $validator->messages();
            
        //     return redirect()->route('home')
        //        ->withErrors($validator)
        //        ->withInput();
        // }

    }
}