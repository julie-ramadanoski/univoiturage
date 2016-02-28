<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
    public function show(Request $request)
    {
        $villedepart  = $request->input('villedepart');
        $villearrivee = $request->input('villearrivee');
        $vehicule = $request->input('vehicule');

        //dd($request->input('datedepart')); "02/17/2016 12:00 AM"
        $date = DateTime::createFromFormat('m/d/Y H:i A', $request->input('datedepart') );
        $dateRecherche = $date->format('Y-m-d');
        
        $trajets = Trajet::TrajetsTrouves( $dateRecherche, $villedepart,  $villearrivee,  $vehicule)->get();
        
        $recherche = [
            'villedepart'  => $request->input('villedepart'),
            'villearrivee' => $request->input('villearrivee'),
            'vehicule'     => $request->input('vehicule'),
            'dateRecherche'=> $request->input('datedepart')
        ];
        
        return view('recherche.resultats', compact('trajets','recherche'));
        
    }
}
