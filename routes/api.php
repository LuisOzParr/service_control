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

Route::resource('users', 'Api\V1\UsersController')->only(['index']);

Route::post('register', 'Auth\Api\PassportController@register');
Route::post('login', 'Auth\Api\PassportController@login');

Route::post('sign-out', 'Auth\Api\PassportController@signOut')
    ->middleware('auth:api');

Route::post('test-authenticated', 'Auth\Api\PassportController@testAuthenticated')
    ->middleware('auth:api');