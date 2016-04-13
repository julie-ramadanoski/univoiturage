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
	Route::get('/', ['as'=>'home', 'uses'=>'RechercheController@home']);
	Route::post('/recherche', ['as'=>'listRecherche', 'uses'=>'RechercheController@show']);
	Route::get('/recherche/{id}', ['as'=>'detailRecherche', 'uses'=>'RechercheController@detail']);

	Route::post('/recherche/{idTraj}/question', ['as'=>'storeQuestion', 'uses'=>'QuestionController@store']);
	Route::delete('/question/{id}', ['as'=>'deleteQuestion', 'uses'=>'QuestionController@destroy']);
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/profil', ['uses'=>'ProfilController@show']); 
	Route::post('/profil', ['uses'=>'ProfilController@update']);
	
});

Route::get('/autocomplete/ville/{univ?}', ['uses'=>'AutocompleteController@ville']);
Route::get('/autocomplete/univ',  		 ['uses'=>'AutocompleteController@univ']);
Route::get('/autocomplete/site',  		 ['uses'=>'AutocompleteController@site']);

/**
 * API pour application mobile
 */
Route::group(['prefix' => 'api', 'middleware' => 'cors'], function()
{
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/autocomplete/ville', 'AuthenticateController@getVille');
    Route::get('authenticate/user',	'AuthenticateController@getAuthenticatedUser');
    Route::get('authenticate/alertes/{depart?}', 'AuthenticateController@getAlertes');
    Route::post('authenticate/alertes', 'AuthenticateController@setAlertes');
    Route::post('authenticate/alertes/delete', 'AuthenticateController@delAlertes');
    Route::get('authenticate/coord/{lat}/{lon}/{zoneKm}', 'AuthenticateController@getGeoloc');
});

/* Florian G. */
/* Routes en rapport avec les ajouts de trajets */
Route::any('trajet/add', 'TrajetController@getView');
Route::any('trajet/addDetails', 'TrajetController@getView2'); 
Route::any('trajet/addTrajet', 'TrajetController@addTrajet');

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



Route::group(['middleware' => ['web', 'auth', 'admin']], function () {
	Route::any('/admin', ['as' => 'backMarq', 'uses' => 'MarqueController@getList']);
	Route::any('/back', ['as' => 'backMarq', 'uses' => 'MarqueController@getList']);

	//marque
	Route::get('back/marque', ['as' => 'backMarq', 'uses' => 'MarqueController@getList']);
	Route::any('back/marque/edit','MarqueController@edit');
	Route::any('back/marque/del/{id}','MarqueController@del');
	Route::any('back/marque/add','MarqueController@add');

	//modèles
	Route::get('back/modele', [
	    'as' => 'backModel', 'uses' => 'ModeleController@getList'
	]);
	Route::any('back/modele/edit','ModeleController@edit');
	Route::any('back/modele/del/{id}','ModeleController@del');
	Route::any('back/modele/add','ModeleController@add');

	//véhicule
	Route::get('back/vehicule', [
	    'as' => 'backvehicule', 'uses' => 'VehiculeController@getList'
	]);
	Route::any('back/vehicule/edit','VehiculeController@edit');
	Route::any('back/vehicule/del/{id}','VehiculeController@del');
	Route::any('back/vehicule/add','VehiculeController@add');

	//université
	Route::get('back/universite', [
	    'as' => 'backuniv', 'uses' => 'UniversiteController@getList'
	]);
	Route::any('back/universite/edit','UniversiteController@edit');
	Route::any('back/universite/del/{id}','UniversiteController@del');
	Route::any('back/universite/add','UniversiteController@add');

	//ville
	Route::get('back/ville', [
	    'as' => 'backville', 'uses' => 'VilleController@getList'
	]);
	Route::any('back/ville/edit','VilleController@edit');
	Route::any('back/ville/del/{id}','VilleController@del');
	Route::any('back/ville/add','VilleController@add');

	//site
	Route::get('back/site', [
	    'as' => 'backsite', 'uses' => 'SiteController@getList'
	]);
	Route::any('back/site/edit','SiteController@edit');
	Route::any('back/site/del/{id}','SiteController@del');
	Route::any('back/site/add','SiteController@add');
});


Route::get('/commentcamarche', 'RechercheController@commentcamarche');

