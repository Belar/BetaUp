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

Route::group(array('prefix' => \Config::get('betaup::config.uri')), function()
{

Route::get('/massmail', 'Belar\Betaup\BetaController@massMail');
Route::post('/massmail', 'Belar\Betaup\BetaController@massMailAction');
    
    
Route::get('/referal/{refer_code?}', 'Belar\Betaup\BetaController@index');


Route::get('/activate/{activation_code}', 'Belar\Betaup\BetaController@activateBeta');
    
Route::post('/', 'Belar\Betaup\BetaController@store');
Route::get('/', 'Belar\Betaup\BetaController@index');

});
