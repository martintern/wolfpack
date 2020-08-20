<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//TODO: auth:api
Route::middleware('auth')->namespace('Api')->group(function () {
    Route::post('/packs', 'PackController@store');
    Route::get('/wolves', 'WolfController@index');
    Route::post('/wolves', 'WolfController@store');
    Route::put('/wolves/{wolf}', 'WolfController@update');
    Route::delete('/wolves/{wolf}', 'WolfController@destroy');
});
