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

    public function index(){}
}
