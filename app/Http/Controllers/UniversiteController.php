<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Universite;

class UniversiteController extends Controller
{    
    public function del($id){
    	DB::table('universite')->where('idUniv', "=", $id)->delete();
		return redirect()->route('backuniv');
    }

    public function edit(Request $request){
        $universite = Universite::where('idUniv',$request->input('idUniv'))->get()->first();
        $universite->nomUniv = $request->input('nomUniv');
        $universite->adr1Univ = $request->input('adr1Univ');
        $universite->adr2Univ = $request->input('adr2Univ');
        $universite->telUniv = $request->input('telUniv');
        $universite->mailUniv = $request->input('mailUniv');
        $universite->photoUniv = $request->input('photoUniv');
        $universite->logoUniv = $request->input('logoUniv');
        $universite->latUniv = $request->input('latUniv');
        $universite->longUniv = $request->input('longUniv');
        $universite->inseeVille = $request->input('inseeVille');
        $universite->save();
        return redirect()->route('backuniv');
    }

    public function getList(){
        $universites = Universite::all();
        return view('backoffice.universites',compact("universites"));
    }

    public function add(Request $request){
        $universite = Universite::create([
            'nomUniv' => $request->input('nomUniv'),
            'adr1Univ' => $request->input('adr1Univ'),
            'adr2Univ' => $request->input('adr2Univ'),
            'telUniv' => $request->input('telUniv'),
            'mailUniv' => $request->input('mailUniv'),
            'photoUniv' => $request->input('photoUniv'),
            'logoUniv' => $request->input('logoUniv'),
            'latUniv' => $request->input('latUniv'),
            'longUniv' => $request->input('longUniv'),
            'inseeVille' => $request->input('inseeVille'),
        ]);
        $universite->save();
        return redirect()->route('backuniv');
    }
}
