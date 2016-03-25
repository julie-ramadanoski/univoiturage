<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Marque;

class MarqueController extends Controller
{
    
    public function getList(){
        $marques = Marque::all();
        return view('backoffice.marques',compact("marques"));
    }

}
