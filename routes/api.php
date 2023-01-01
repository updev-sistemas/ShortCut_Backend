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

Route::middleware('guest')->post('/user', function (Request $request) {
    return response(['data' => 'ok'],200);
});

Route::middleware('guest')->post('/register/n/e/link', 'Api\LinkController@store');
