<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Site;
use App\Universite;

class SiteController extends Controller
{    
    public function del($id){
    	DB::table('site')->where('idSite', "=", $id)->delete();
		return redirect()->route('backsite');
    }

    public function edit(Request $request){
        $site = Site::where('idSite',$request->input('idSite'))->get()->first();
        $site->nomSite = $request->input('nomSite');
        $site->adr1Site = $request->input('adr1Site');
        $site->adr2Site = $request->input('adr2Site');
        $site->idUniv = $request->input('idUniv');
        $site->inseeVille = $request->input('inseeVille');
        $site->save();
        return redirect()->route('backsite');
    }

    public function getList(){
        $sites = Site::all();
        $universites = Universite::all();
        return view('backoffice.sites',compact("sites", "universites"));
    }

    public function add(Request $request){
        $site = Site::create([
            'nomSite' => $request->input('nomSite'),
            'adr1Site' => $request->input('adr1Site'),
            'adr2Site' => $request->input('adr2Site'),
            'idUniv' => $request->input('idUniv'),
            'inseeVille' => $request->input('inseeVille'),
        ]);
        $site->save();
        return redirect()->route('backsite');
    }
}
