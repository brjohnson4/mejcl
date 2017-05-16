<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/input', 'ResultController@index');

Route::post('/input', 'ResultController@store');

Route::get('/results', 'ResultController@show');

Route::post('test-results', 'ResultController@testResults');

Route::get('/olympika-entry', function() { return view('olympika.entry'); })->middleware('dev');
Route::post('olympika-entry', 'OlympikaController@storeOlympikaEntries');

Route::get('/olympika-input', function() { return view('olympika.input'); })->middleware('dev');
Route::post('olympika-input-individual', 'OlympikaController@storeIndividual');
Route::post('olympika-input-school', 'OlympikaController@storeSchool');

Route::get('/creative-input', function() { return view('creative.input'); })->middleware('dev');
Route::post('creative-input-individual', 'CreativeController@storeIndividual');
Route::post('creative-input-school', 'CreativeController@storeSchool');

$router->get('/register', function(){
         // have this redirect to a page of your choice.
    });