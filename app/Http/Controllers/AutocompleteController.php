<?php

namespace App\Http\Controllers;


use DB;
use Response;
use Request;
use App\Universite;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;


class AutocompleteController extends Controller
{

	/**
	 * Retourne une liste des 10 premiers sites universitaires
	 * completant les premiers caractères d'une recherche 
	 */
	public function ville(Request $request, $univ = null ){

		$term = Str::lower(Input::get('term'));

		// Récupérer l'identifiant de l'université		
		$univ2 = Universite::where('nomUniv', $univ)->get();	
		
		$data = DB::table("site")->distinct('nomSite')
								 ->where('nomsite', 'like', $term.'%')
								 ->where('idUniv', $univ2[0]->idUniv)
								 ->groupBy('nomSite')
								 ->take(10)
								 ->get();
		$data2 = DB::table("ville")->distinct('nomVille')
								 ->where('nomVille', 'like', $term.'%')
								 ->take(10)
								 ->get();
		
		$jsonArr = array();
		
		foreach ($data as $value) {
			$jsonArr[]= array( 'value' => $value->nomSite );
		}
		foreach ($data2 as $value) {
			$jsonArr[]= array( 'value' => $value->nomVille );
		}
		
		return Response::json($jsonArr);
	}
	/**
	 * Retourne une liste d'universitées avec identifiants
	 * completant les premiers caractères d'une recherche 
	 */
	public function site(){

		$term = Str::lower(Input::get('term'));
		$data = DB::table("site")->distinct('nomSite', 'idSite')->where('nomSite', 'like', $term.'%')->groupBy('nomSite')->get();
		$jsonArr = array();
		
		foreach ($data as $value) {
			$jsonArr[]= array( $value->idSite => $value->nomSite );
		}

		return Response::json($jsonArr);
	}
	/**
	 * Retourne une liste d'universitées
	 * completant les premiers caractères d'une recherche 
	 */
	public function univ(){

		$term = Str::lower(Input::get('term'));
		$data = DB::table("universite")->distinct('nomUniv', 'idUniv')->where('nomUniv', 'like', $term.'%')->take(10)->get();
		$jsonArr = array();
		
		foreach ($data as $value) {
			$jsonArr[]= array( 'value' => $value->nomUniv );
		}

		return Response::json($jsonArr);
	}
}
