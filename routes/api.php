<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'auth:api'
], function () {
	// Route::get('/quotes', 'QuoteController@index');
	Route::get('/quotes', 'QuoteController@index')->where('quotes', '.*');
	Route::get('/quotes/store', 'QuoteController@store');
	// Route::get('/quotes/save', 'QuoteController@save');
	Route::get('/quotes/{id}', 'QuoteController@item');
});

