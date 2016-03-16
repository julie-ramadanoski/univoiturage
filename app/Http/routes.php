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
Route::get('add', function () {
    return view('ajout_trajet');
});

Route::get('/', function () {
    return view('ajout_trajet');
});



Route::group(['prefix'=>'trajet'],function(){
	Route::get(
		'/', 
		['as' => 'affichageTrajets', 'uses' => 'TrajetController@affichageTrajets']
	);
	Route::get(
		'add',
		['as' => 'ajoutTrajet', 'uses' => 'TrajetController@ajoutTrajet']
	);
	Route::post(
		'add',
		['as' => 'traitementAjoutTrajet', 'uses' => 'TrajetController@traitementAjoutTrajet']
	);
	Route::get(
		'{id}',
		['as' => 'affichageTrajet', 'uses' => 'TrajetController@affichageTrajet']
	);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
	Route::resource('posts','PostsController');
});



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
    //
});

