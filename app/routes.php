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
Route::get('/acteurs/{id}', 'ActeursController@view');
Route::get('/acteurs/create/{id}', 'ActeursController@create');
Route::get('/acteurs/edit/{id}', 'ActeursController@edit');
Route::post('/acteurs/store/{id}', 'ActeursController@store');
Route::post('/acteurs/update/{id}', 'ActeursController@update');
Route::get('/acteurs/delete/{id}', 'ActeursController@delete');
