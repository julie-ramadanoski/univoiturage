<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;

use Validator;

use App\Trajet;
use DateTime;

class RechercheController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $columnSizes = [
                  'sm' => [4, 8],
                  'lg' => [2, 10]
                ];

        return view('recherche.form', compact('columnSizes')); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Double validation du formulaire
        $validator = Validator::make($request->all(), [
            'villedepart'  => 'required|min:2',
            'villearrivee' => 'required|min:2',
            'datedepart'   => 'required',
            'vehicule'     => 'required',
        ]);

        $data = $request->session()->all();

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            
            return redirect()->route('home')
               ->withErrors($validator)
               ->withInput();

        }

        $recherche = (object) array(
            'villedepart'  => $request->input('villedepart'),
            'villearrivee' => $request->input('villearrivee'),
            'vehicule'     => $request->input('vehicule'),
            'dateRecherche'=> $request->input('datedepart')
        );

        // dd($request->input('datedepart')); "02/17/2016 12:00 AM"
        $date = DateTime::createFromFormat('m/d/Y H:i A', $recherche->dateRecherche );
        $dateRecherche = $date->format('Y-m-d');
        
        $trajets = Trajet::TrajetsTrouves( $dateRecherche, $recherche->villedepart, $recherche->villearrivee, $recherche->vehicule)
                                        ->get();
        
        return view('recherche.resultats', compact('trajets','recherche'));
        
    }
     /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentcamarche(Request $request)
    {
        return view('recherche.commentcamarche');
        
    }
    
}
