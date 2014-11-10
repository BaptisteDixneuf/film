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

Route::get('/', 'ActeursController@index');

//Acteurs
Route::get('/acteurs/index', 'ActeursController@index');
Route::get('/acteurs/view/{id}', 'ActeursController@view');
Route::get('/acteurs/create/{id}', 'ActeursController@create');
Route::post('/acteurs/store/{id}', 'ActeursController@store');
Route::get('/acteurs/edit/{id}', 'ActeursController@edit');
Route::post('/acteurs/update/{id}', 'ActeursController@update');
Route::get('/acteurs/delete/{id}', 'ActeursController@delete');

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