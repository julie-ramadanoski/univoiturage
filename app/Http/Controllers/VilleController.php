<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Ville;

class VilleController extends Controller
{    
    public function del($id){
    	DB::table('ville')->where('inseeVille', "=", $id)->delete();
		return redirect()->route('backville');
    }

    public function edit(Request $request){
        $ville = Ville::where('inseeVille',$request->input('inseeVille'))->get()->first();
        $ville->inseeVille = $request->input('inseeVille');
        $ville->codePostalVille = $request->input('codePostalVille');
        $ville->nomVille = $request->input('nomVille');
        $ville->latitudeVille = $request->input('latitudeVille');
        $ville->longitudeVille = $request->input('longitudeVille');
        $ville->save();
        return redirect()->route('backville');
    }

    public function getList(){
        $villes = Ville::all();
        return view('backoffice.villes',compact("villes"));
    }

    public function add(Request $request){
        $ville = Ville::create([
            'inseeVille' => $request->input('inseeVille'),
            'codePostalVille' => $request->input('codePostalVille'),
            'nomVille' => $request->input('nomVille'),
            'latitudeVille' => $request->input('latitudeVille'),
            'longitudeVille' => $request->input('longitudeVille'),
        ]);
        $ville->save();
        return redirect()->route('backville');
    }

    public function getVillesApi(Request $request){
        $city = $request->input('city','');
        $villes = Ville::where("nomVille",'like',$city."%")->take(5)->get();
        return response()->json($villes);
    }
}
