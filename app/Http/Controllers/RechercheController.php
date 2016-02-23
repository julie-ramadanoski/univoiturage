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

        //dd($request->input('datedepart')); "02/17/2016 12:00 AM"
        $date = DateTime::createFromFormat('m/d/Y H:i A', $request->input('datedepart') );
        $dateRecherche = $date->format('Y-m-d');
        
        $trajets = Trajet::TrajetsTrouves( $dateRecherche, $request->input('villedepart'),  $request->input('villearrivee'),  $request->input('vehicule'));
        
        return view('recherche.resultats', compact('trajets'));
    }
}
