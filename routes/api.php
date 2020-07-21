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
Route::get('/login', 'ApiController\Auth\AuthController@login')->name('login');
Route::post('/login', 'ApiController\Auth\AuthController@login')->name('login');
Route::post('/register','ApiController\Auth\AuthController@register');
// Auth login end


Route::group(['middleware' => ['cors', 'jsonResponse','auth:api']], function () {
     
    Route::post('/insert-course','ApiController\Course\CourseController@insertCourse');
    Route::post('/get-all-course','ApiController\Course\CourseController@getCourse');
    Route::post('/del-course','ApiController\Course\CourseController@delCourse');
    Route::post('/edit-course','ApiController\Course\CourseController@editCourse');
    Route::post('/add-course-outline','ApiController\Course\CourseController@addCourseOutline');
  
    Route::post('/del-course-outline','ApiController\Course\CourseController@delCourseOutline');
    Route::post('/update-course-outline','ApiController\Course\CourseController@updateCourseOutline');
    Route::post('/assign-courses','ApiController\Program\ProgramController@AssignCourses');
    Route::post('/assign-course-to-program','ApiController\Program\ProgramController@AssignCourseToProgram');

    //  program routes start
    Route::post('/insert-program','ApiController\Program\ProgramController@insertProgram');
    Route::post('/get-program','ApiController\Program\ProgramController@getProgram');
    Route::post('/del-program','ApiController\Program\ProgramController@deleteProgram');
    Route::post('/edit-program','ApiController\Program\ProgramController@editProgram');
    Route::post('/del-assign-course','ApiController\Program\ProgramController@delAssignCourse');
    //  program routes end
  Route::post('/all-country','ApiController\StudentRegistration\RegistrationController@allCountry');
  Route::post('/all-cities','ApiController\StudentRegistration\RegistrationController@allCity');
    // register student start
    Route::post('/get-gender','ApiController\StudentRegistration\RegistrationController@getGender');
    Route::post('/get-guardian','ApiController\StudentRegistration\RegistrationController@getGuardian');
    Route::post('/get-shift','ApiController\StudentRegistration\RegistrationController@getShift');
    Route::post('/get-all-program','ApiController\StudentRegistration\RegistrationController@getAllProgram');
    Route::post('/get-blood-group','ApiController\StudentRegistration\RegistrationController@getBloodGroup');
  Route::post('/all-states','ApiController\StudentRegistration\RegistrationController@getStates');
    Route::post('/register-student','ApiController\StudentRegistration\RegistrationController@registerStudent');
    Route::post('/get-all-time-table','ApiController\TimeTable\TimeTableController@getAllTimeTable');
    Route::post('/check-time-table','ApiController\TimeTable\TimeTableController@checkTimeTable');
    Route::post('/time-table-data','ApiController\TimeTable\TimeTableController@TimeTableDataById');
    Route::post('//time-table-status','ApiController\TimeTable\TimeTableController@changeTimeTableStatus');
    // register student End
    Route::post('/get-class-room-detail','ApiController\ClassRoom\ClassRoomController@getAllClassRoom');
    Route::post('/insert-time-table','ApiController\TimeTable\TimeTableController@InserTimeTable');
    // *** Route Group End ***//
});

