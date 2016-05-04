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

Route::get('/', function () {
    //return view('welcome');
	return 'Hello world';
});

//Define API routing
Route::group(array('prefix' => 'api'), function()
{
	Route::resource('coin', 'CoinController', ['except'=>['create', 'store', 'edit', 'destroy']]);
});
