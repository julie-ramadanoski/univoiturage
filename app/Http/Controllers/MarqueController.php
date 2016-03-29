<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Marque;

class MarqueController extends Controller
{
    
    public function del($id){
    	DB::table('modele')->where('idMarq', "=", $id)->delete();
        DB::table('marque')->where('idMarq', '=', $id)->delete();
		return redirect()->route('backMarq');
    }

    public function edit(Request $request){
        $marque = Marque::where('idMarq',$request->input('idMarq'))->get()->first();
        $marque->nomMarq = $request->input('nomMarq');
        $marque->save();
        return redirect()->route('backMarq');
    }

    public function getList(){
        $marques = Marque::all();
        return view('backoffice.marques',compact("marques"));
    }

    public function add(Request $request){
        $marque = Marque::create([
            'nomMarq' => $request->input('nomMarq')
        ]);
        $marque->save();
        return redirect()->route('backMarq');
    }

}
