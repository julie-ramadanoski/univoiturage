<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
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
	Route::get('/', ['as'=>'home', function () {   
		
		$columnSizes = [
	              'sm' => [4, 8],
	              'lg' => [2, 10]
	            ];

		return view('recherche.form', compact('columnSizes')); 
	}]);
	Route::post('/recherche', ['as'=>'listRecherche', 'uses'=>'RechercheController@show']);
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/profil', ['uses'=>'ProfilController@show']); 
	Route::post('/profil', ['uses'=>'ProfilController@update']);
});

Route::any('/autocompleteVille', function(){

	$term = Str::lower(Input::get('term'));
	$data = DB::table("site")->distinct('nomSite')->where('nomsite', 'like', $term.'%')->groupBy('nomSite')->take(10)->get();
	$jsonArr = array();
	
	foreach ($data as $value) {
		$jsonArr[]= array( 'value' => $value->nomSite );
	}

	return Response::json($jsonArr);
});

Route::any('/autocompleteUniv', function(){

	$term = Str::lower(Input::get('term'));
	$data = DB::table("universite")->distinct('nomUniv', 'idUniv')->where('nomUniv', 'like', $term.'%')->groupBy('nomUniv')->take(10)->get();
	$jsonArr = array();
	
	foreach ($data as $value) {
		$jsonArr[]= array( 'value' => $value->nomUniv );
	}

	return Response::json($jsonArr);
});

Route::any('/autocompleteSite', function(){

	$term = Str::lower(Input::get('term'));
	$data = DB::table("site")->distinct('nomSite', 'idSite')->where('nomSite', 'like', $term.'%')->groupBy('nomSite')->get();
	$jsonArr = array();
	
	foreach ($data as $value) {
		$jsonArr[]= array( $value->idSite => $value->nomSite );
	}

	return Response::json($jsonArr);
});


Route::group(['prefix' => 'api', 'middleware' => 'cors'], function()
{
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user',	'AuthenticateController@getAuthenticatedUser');
    Route::get('authenticate/alertes/{depart?}', 'AuthenticateController@getAlertes');
    Route::post('authenticate/alertes', 'AuthenticateController@setAlertes');
    Route::post('authenticate/alertes/delete', 'AuthenticateController@delAlertes');
});

/* Florian G. */
/* Routes en rapport avec les ajouts de trajets */
Route::get('trajet/add', 'TrajetController@getView'); //On apelle la vue qui correspond à l'ajout d'un trajet
Route::post('trajet/add', 'TrajetController@add'); //Cette page est apellée en AJAX avec en paramètre l'objet trajet (Json)


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

	
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/commentcamarche', 'RechercheController@commentcamarche');
