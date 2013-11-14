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



Route::resource('beta', 'betaController', array('only' => array('store')));

Route::controller('beta', 'betaController');
Route::get('/beta/activate/{activation_code}', 'betaController@activateBeta');

Route::get('/', function()
{
	return View::make('beta.landing');
});

