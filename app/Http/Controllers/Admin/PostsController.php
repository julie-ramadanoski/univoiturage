<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Inclut l'authentification
use Illuminate\Support\Facades\Hash; //Inclut les hash
use App\User; //Inclut les utilisateurs

class PostsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth'); //Controller non accessible si l'utilisateur n'est pas connecté

    }

    public function index(){
        User::create(['email'=>'test@exemple.fr', 'password'=>Hash::make('azerty01'), 'name'=>'florian']) //Création et enregistrement d'un utilisateur
        Auth::attempt(['email'=>'test@exemple.fr', 'password' => 'azerty01']); //Test la connexion de l'utilisateur donné
        Auth::check();
    }
}
