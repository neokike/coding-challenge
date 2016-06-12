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

use App\Http\Controllers\CuboController;

Route::get('/', ['as' => 'home', 'uses' => 'CuboController@index']);
Route::post('/ejecutar', ['as' => 'ejecutar', 'uses' => 'CuboController@ejecutar']);
