<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Trajet;

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
        $trajets = Trajet::etapetrajets()->get();
       //dd($trajets);

        return view('recherche.resultats', compact('trajet'));
    }
}
