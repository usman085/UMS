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

// Auth login Start
Route::post('/login', 'ApiController\Auth\AuthController@login');
Route::post('/register','ApiController\Auth\AuthController@register');
// Auth login end


Route::group(['middleware' => ['cors', 'jsonResponse','auth:api']], function () {
  
    Route::post('/insert-course','ApiController\Course\CourseController@insertCourse');
    Route::post('/get-all-course','ApiController\Course\CourseController@getCourse');

    //  program routes start
    Route::post('/insert-program','ApiController\Program\ProgramController@insertProgram');
    Route::post('/get-program','ApiController\Program\ProgramController@getProgram');
    //  program routes end


    
    // *** Route Group End ***//
});

