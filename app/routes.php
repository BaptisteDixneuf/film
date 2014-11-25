<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'FilmsController@index');

//Acteurs
Route::get('/acteurs/index', 'ActeursController@index');
Route::get('/acteurs/view/{id}', 'ActeursController@view');
Route::get('/acteurs/create/{id}', 'ActeursController@create');
Route::post('/acteurs/store/{id}', 'ActeursController@store');
Route::get('/acteurs/edit/{id}', 'ActeursController@edit');
Route::post('/acteurs/update/{id}', 'ActeursController@update');
Route::get('/acteurs/delete/{id}', 'ActeursController@delete');
Route::get('/acteurs/search', 'ActeursController@search');

//Réalisateurs
Route::get('/realisateurs/index', 'RealisateursController@index');
Route::get('/realisateurs/view/{id}', 'RealisateursController@view');
Route::get('/realisateurs/create/{id}', 'RealisateursController@create');
Route::post('/realisateurs/store/{id}', 'RealisateursController@store');
Route::get('/realisateurs/edit/{id}', 'RealisateursController@edit');
Route::post('/realisateurs/update/{id}', 'RealisateursController@update');
Route::get('/realisateurs/delete/{id}', 'RealisateursController@delete');

//Distributeurs
Route::get('/distributeurs/index', 'DistributeursController@index');
Route::get('/distributeurs/view/{id}', 'DistributeursController@view');
Route::get('/distributeurs/create/{id}', 'DistributeursController@create');
Route::post('/distributeurs/store/{id}', 'DistributeursController@store');
Route::get('/distributeurs/edit/{id}', 'DistributeursController@edit');
Route::post('/distributeurs/update/{id}', 'DistributeursController@update');
Route::get('/distributeurs/delete/{id}', 'DistributeursController@delete');

//Films
Route::get('/films/index', 'FilmsController@index');
Route::get('/films/view/{id}', 'FilmsController@view');
Route::get('/films/create/{id}', 'FilmsController@create');
Route::post('/films/store/{id}', 'FilmsController@store');
Route::get('/films/edit/{id}', 'FilmsController@edit');
Route::post('/films/update/{id}', 'FilmsController@update');
Route::get('/films/delete/{id}', 'FilmsController@delete');

//affiches
Route::get('/affiches/index', 'AffichesController@index');
Route::get('/affiches/view/{id}', 'AffichesController@view');
Route::get('/affiches/create/{id}', 'AffichesController@create');
Route::post('/affiches/store/{id}', 'AffichesController@store');
Route::get('/affiches/edit/{id}', 'AffichesController@edit');
Route::post('/affiches/update/{id}', 'AffichesController@update');
Route::get('/affiches/delete/{id}', 'AffichesController@delete');