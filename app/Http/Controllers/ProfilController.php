<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
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
            'prenomMemb' => 'required|max:255',
            'password' => 'required|confirmed|min:4',
            'email' => 'required|email|max:255|unique:users',
            'telMobMemb'=>'required|numeric|min:8',
            'anNaisMemb'=> 'requited|numeric',
            'sexeMemb'=>'required'
        ]);
        dd($validator->fails());

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            
            return redirect()->route('home')
               ->withErrors($validator)
               ->withInput();
        }
        else{
            $this->update($request);
        }

    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->prenomMemb = $request->input('prenomMemb');
        $user->email = $request->input('email');
        $user->telMobMemb = $request->input('telMobMemb');
        $user->anNaisMemb = $request->input('anNaisMemb');
        $user->prefMemb = $request->input('prefMemb');
        $user->save();
        // dd($user);

        return view('/');
    }
}