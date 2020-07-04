<?php

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

Route::post('/login', 'ApiController\Auth\AuthController@login')->name('login.api');
Route::post('/register','ApiController\Auth\AuthController@register')->name('register.api');
// Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');

Route::group(['middleware' => ['cors', 'jsonResponse','auth:api']], function () {
    Route::post('/check',function(){
        return 'hi';
    });
});

