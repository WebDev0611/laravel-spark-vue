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

Route::get('/clients', 'ClientController@index')->where('clients', '.*');

Route::get('/new-quote', 'QuoteController@show');

// Route::get('/quotes', 'QuoteController@list');
Route::get('/quotes', 'QuoteController@list')->where('quotes', '.*');
// Route::get('/quotes', 'QuoteController@store');

Route::post('/quotes/store', 'QuoteController@store');

Route::get('/quotes/{id}', 'QuoteController@item');

Route::get('/ninja', 'IninjaController@getData');
