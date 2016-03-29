<?php

namespace App\Http\Controllers;


use DB;
use Response;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;


class AutocompleteController extends Controller
{

	/**
	 * Retourne une liste des 10 premiers sites universitaires
	 * completant les premiers caractères d'une recherche 
	 */
	public function ville(){

		$term = Str::lower(Input::get('term'));
		$data = DB::table("site")->distinct('nomSite')->where('nomsite', 'like', $term.'%')->groupBy('nomSite')->take(10)->get();
		$jsonArr = array();
		
		foreach ($data as $value) {
			$jsonArr[]= array( 'value' => $value->nomSite );
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
		$data = DB::table("universite")->distinct('nomUniv', 'idUniv')->where('nomUniv', 'like', $term.'%')->groupBy('nomUniv')->take(10)->get();
		$jsonArr = array();
		
		foreach ($data as $value) {
			$jsonArr[]= array( 'value' => $value->nomUniv );
		}

		return Response::json($jsonArr);
	}
}
