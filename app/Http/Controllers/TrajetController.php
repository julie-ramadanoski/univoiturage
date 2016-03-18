<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrajetController extends Controller
{
    /* Fonction d'affichage de la page d'ajout de trajet */
    public function getView(){
    	/*Récupération des voitures de l'utilisateur connecté*/
    	//$user = $auth->user()->vehicules()->get();
    	/*Affichage de la vue avec les voitures passées en paramètre*/

        /* Appel de la vue */
        return view('trajet.ajout');
    }

    /* Fonction de traitement d'ajout de trajet */
    public function traitementAjoutTrajet(){
    	/*récupération de l'utilisateur connecté*/

    	/*récupération des données sur la voiture*/

    	/*récupération des données générales du trajet*/

    	/*récupération des données sur les étapes*/
    }
}
