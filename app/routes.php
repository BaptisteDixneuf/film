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

/*Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});*/

Route::get('/', 'AccueilsController@index');

//Acteurs
Route::get('/acteurs', 'ActeursController@index');
Route::get('/acteurs/index', 'ActeursController@index');
Route::get('/acteurs/view/{id}', 'ActeursController@view');
Route::get('/acteurs/create', 'ActeursController@create');
Route::post('/acteurs/store/{id}', 'ActeursController@store');
Route::post('/acteurs/add/{id}', 'ActeursController@add');
Route::get('/acteurs/edit/{id}', 'ActeursController@edit');
Route::post('/acteurs/update/{id}', 'ActeursController@update');
Route::get('/acteurs/delete/{id}', 'ActeursController@delete');
Route::get('/acteurs/search', 'ActeursController@search'); // Liaison acteur_film

//Réalisateurs
Route::get('/realisateurs', 'RealisateursController@index');
Route::get('/realisateurs/index', 'RealisateursController@index');
Route::get('/realisateurs/view/{id}', 'RealisateursController@view');
Route::get('/realisateurs/create', 'RealisateursController@create');
Route::post('/realisateurs/store/{id}', 'RealisateursController@store');
Route::post('/realisateurs/add/{id}', 'RealisateursController@add');
Route::get('/realisateurs/edit/{id}', 'RealisateursController@edit');
Route::post('/realisateurs/update/{id}', 'RealisateursController@update');
Route::get('/realisateurs/delete/{id}', 'RealisateursController@delete');

//Distributeurs
Route::get('/distributeurs', 'DistributeursController@index');
Route::get('/distributeurs/index', 'DistributeursController@index');
Route::get('/distributeurs/view/{id}', 'DistributeursController@view');
Route::get('/distributeurs/create', 'DistributeursController@create');
Route::post('/distributeurs/add/{id}', 'DistributeursController@add');
Route::post('/distributeurs/store/{id}', 'DistributeursController@store');
Route::get('/distributeurs/edit/{id}', 'DistributeursController@edit');
Route::post('/distributeurs/update/{id}', 'DistributeursController@update');
Route::get('/distributeurs/delete/{id}', 'DistributeursController@delete');

//Films
Route::get('/films', 'FilmsController@index');
Route::get('/films/index', 'FilmsController@index');
Route::get('/films/view/{id}', 'FilmsController@view');
Route::get('/films/create', 'FilmsController@create');
Route::post('/films/store/{id}', 'FilmsController@store');
Route::get('/films/edit/{id}', 'FilmsController@edit');
Route::post('/films/update/{id}', 'FilmsController@update');
Route::get('/films/delete/{id}', 'FilmsController@delete');

//affiches
Route::get('/affiches/index', 'AffichesController@index');
Route::get('/affiches/view/{id}', 'AffichesController@view');
Route::get('/affiches/create', 'AffichesController@create');
Route::post('/affiches/store/{id}', 'AffichesController@store');
Route::get('/affiches/edit/{id}', 'AffichesController@edit');
Route::post('/affiches/update/{id}', 'AffichesController@update');
Route::get('/affiches/delete/{id}', 'AffichesController@delete');

//Genres
Route::get('/genres', 'GenresController@index');
Route::get('/genres/index', 'GenresController@index');
Route::get('/genres/view/{id}', 'GenresController@view');
Route::get('/genres/create', 'GenresController@create');
Route::post('/genres/add/{id}', 'GenresController@add');
Route::post('/genres/store/{id}', 'GenresController@store');
Route::get('/genres/edit/{id}', 'GenresController@edit');
Route::post('/genres/update/{id}', 'GenresController@update');
Route::get('/genres/delete/{id}', 'GenresController@delete');


//Migration SQL
Route::get('/migrations', 'MigrationsController@index');
Route::get('/migrations/index', 'MigrationsController@index');

//Accueil
Route::get('/accueil', 'AccueilsController@index');
Route::get('/accueil/index', 'AccueilsController@index');

//Recherche
Route::get('/recherches/index', 'RecherchesController@index');
Route::post('/recherches/view', 'RecherchesController@view');


//Nationalite
Route::get('/nationalites', 'NationalitesController@index');
Route::get('/nationalites/index', 'NationalitesController@index');
Route::get('/nationalites/view/{id}', 'NationalitesController@view');
Route::get('/nationalites/create', 'NationalitesController@create');
Route::post('/nationalites/add/{id}', 'NationalitesController@add');
Route::post('/nationalites/store/{id}', 'NationalitesController@store');
Route::get('/nationalites/edit/{id}', 'NationalitesController@edit');
Route::post('/nationalites/update/{id}', 'NationalitesController@update');
Route::get('/nationalites/delete/{id}', 'NationalitesController@delete');
