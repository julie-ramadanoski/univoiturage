<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Modele;
use App\Vehicule;
use App\User;
use App\Type;

class VehiculeController extends Controller
{    
    public function del($id){
    	DB::table('vehicule')->where('idVeh', "=", $id)->delete();
		return redirect()->route('backvehicule');
    }

    public function edit(Request $request){
        $vehicule = Vehicule::where('idVeh',$request->input('idVeh'))->get()->first();
        $vehicule->photoVeh = $request->input('photoVeh');
        $vehicule->confVeh = $request->input('confVeh');
        $vehicule->nbPlaceVeh = $request->input('nbPlaceVeh');
        $vehicule->couleurVeh = $request->input('couleurVeh');
        $vehicule->defautVeh = $request->input('defautVeh');
        $vehicule->idMemb = $request->input('idMemb');
        $vehicule->idMod = $request->input('idMod');
        $vehicule->idType = $request->input('idType');
        $vehicule->save();
        return redirect()->route('backvehicule');
    }

    public function getList(){
        $vehicules = Vehicule::all();
        $membres = User::all();
        $modeles = Modele::all();
        $types = Type::all();
        return view('backoffice.vehicules',compact("vehicules", "membres", "modeles", "types"));
    }

    public function add(Request $request){
        $vehicule = Vehicule::create([
            'photoVeh' => $request->input('photoVeh'),
            'confVeh' => $request->input('confVeh'),
            'nbPlaceVeh' => $request->input('nbPlaceVeh'),
            'couleurVeh' => $request->input('couleurVeh'),
            'defautVeh' => $request->input('defautVeh'),
            'idMemb' => $request->input('idMemb'),
            'idMod' => $request->input('idMod'),
            'idType' => $request->input('idType'),
        ]);
        $vehicule->save();
        return redirect()->route('backvehicule');
    }
}
