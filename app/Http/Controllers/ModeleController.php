<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Modele;
use App\Marque;

class ModeleController extends Controller
{
    
    public function del($id){
    	DB::table('modele')->where('idMod', "=", $id)->delete();
		return redirect()->route('backModel');
    }

    public function edit(Request $request){
        $modele = Modele::where('idMod',$request->input('idMod'))->get()->first();
        $modele->nomMod = $request->input('nomMod');
        $modele->idMarq = $request->input('idMarq');
        $modele->save();
        return redirect()->route('backModel');
    }

    public function getList(){
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('backoffice.modeles',compact("modeles", "marques"));
    }

    public function add(Request $request){
        $modele = Modele::create([
            'nomMod' => $request->input('nomMod'),
            'idMarq' => $request->input('idMarq')
        ]);
        $modele->save();
        return redirect()->route('backModel');
    }
}
