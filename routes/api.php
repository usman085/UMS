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
    Route::post('/del-course','ApiController\Course\CourseController@delCourse');
    Route::post('/edit-course','ApiController\Course\CourseController@editCourse');


    //  program routes start
    Route::post('/insert-program','ApiController\Program\ProgramController@insertProgram');
    Route::post('/get-program','ApiController\Program\ProgramController@getProgram');
    Route::post('/del-program','ApiController\Program\ProgramController@deleteProgram');
    Route::post('/edit-program','ApiController\Program\ProgramController@editProgram');
    //  program routes end


    

    // *** Route Group End ***//
});

