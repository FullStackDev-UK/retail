<?php

use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    return response()->json(['message' => 'Success. Base API response received. Any deeper requires authentication by registering which creates an API key. This key will be stored in localStorage and attached to any further axios calls'], 200);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request;//->user();
});


Route::get('/contact', 'ContactController@index');
Route::get('/contact/{id}', 'ContactController@show');
Route::post('/contact', 'ContactController@store');