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

Route::get('/beta/massmail', 'Belar\Betaup\BetaController@massMail');
Route::post('/beta/massmail', 'Belar\Betaup\BetaController@massMailAction');

Route::post('beta', 'Belar\Betaup\BetaController@store');
Route::get('/beta/activate/{activation_code}', 'Belar\Betaup\BetaController@activateBeta');

Route::get('/beta', 'Belar\Betaup\BetaController@index');

