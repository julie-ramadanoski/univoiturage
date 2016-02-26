<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrajetController extends Controller
{
    /*
     * Fonction index
     * Liste les trajets réalisés par l'utilisateur connecté
    */
    public function index(){

    }

    /*
     * Fonction show
     * Affiche les détails du trajet avec l'id donné
     * $param id l'id du trajet à affiché
    */
    public function show($id){
        
    }

    /*
     * Fonction create
     * Affiche le formulaire de création d'un trajet
    */
    public function create(){
        return view("trajets.create");
    }

    /*
     * Fonction store
     * Fonction qui sauvegarde le trajet dans la base de donnée.
    */
    public function store(){
        
    }
}
