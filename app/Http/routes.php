<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

 Route::get('/', ['as'=>'home', function () {   
		
		$columnSizes = [
	              'sm' => [4, 8],
	              'lg' => [2, 10]
	            ];

		return view('recherche.form', compact('columnSizes')); 
	}])->middleware(['web']); // gestions des erreurs de formulaire

Route::any('/autocompleteVille', function(){

	$term = Str::lower(Input::get('term'));
	$data = DB::table("site")->distinct('nomSite')->where('nomsite', 'like', $term.'%')->groupBy('nomSite')->take(10)->get();
	$jsonArr = array();
	
	foreach ($data as $value) {
		$jsonArr[]= array( 'value' => $value->nomSite );
	}

	return Response::json($jsonArr);
});

Route::post('/recherche', ['as'=>'listRecherche', 'uses'=>'RechercheController@show']);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {



});
