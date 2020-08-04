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
    
    Route::post('/get-student-class-routine','ApiController\TimeTable\TimeTableController@TimeTableDataForStudent');
  // course
  Route::post('/get-notification-count','ApiController\Notification\NotificationController@getNotificationCount');
  Route::post('/submit-application','ApiController\Application\ApplicationController@submitApplication');
    Route::post('/insert-course','ApiController\Course\CourseController@insertCourse');
    Route::post('/get-all-course','ApiController\Course\CourseController@getCourse');
    Route::post('/del-course','ApiController\Course\CourseController@delCourse');
    Route::post('/edit-course','ApiController\Course\CourseController@editCourse');
    
    // Student Side
    Route::post('/get-course-for-student','ApiController\Course\CourseController@getCourseForStudent');
    
    // Course Outline  
    Route::post('/add-course-outline','ApiController\Course\CourseController@addCourseOutline');
    Route::post('/del-course-outline','ApiController\Course\CourseController@delCourseOutline');
    Route::post('/update-course-outline','ApiController\Course\CourseController@updateCourseOutline');
  
    //Assign Course 
    Route::post('/assign-courses','ApiController\Program\ProgramController@AssignCourses');
    Route::post('/assign-course-to-program','ApiController\Program\ProgramController@AssignCourseToProgram');

    //  program routes start
    Route::post('/insert-program','ApiController\Program\ProgramController@insertProgram');
    Route::post('/get-program','ApiController\Program\ProgramController@getProgram');
    Route::post('/del-program','ApiController\Program\ProgramController@deleteProgram');
    Route::post('/edit-program','ApiController\Program\ProgramController@editProgram');
    Route::post('/del-assign-course','ApiController\Program\ProgramController@delAssignCourse');
    //  program routes end
  
    // country and city
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
  
    // register student End
    // student side
    Route::post('/get-student-class-routine','ApiController\TimeTable\TimeTableController@TimeTableDataForStudent');
  

    // Admin Time table
    Route::post('/del-time-table','ApiController\TimeTable\TimeTableController@delTimeTable');
    Route::post('/get-all-time-table','ApiController\TimeTable\TimeTableController@getAllTimeTable');
    Route::post('/check-time-table','ApiController\TimeTable\TimeTableController@checkTimeTable');
    Route::post('/time-table-data','ApiController\TimeTable\TimeTableController@TimeTableDataById');
    Route::post('/update-time-table-data','ApiController\TimeTable\TimeTableController@UpdateTimeTable');
    Route::post('/time-table-status','ApiController\TimeTable\TimeTableController@changeTimeTableStatus');
    Route::post('/get-class-room-detail','ApiController\ClassRoom\ClassRoomController@getAllClassRoom');
    Route::post('/insert-time-table','ApiController\TimeTable\TimeTableController@InserTimeTable');


    // Exam Routine
    // Student Side
    Route::post('/get-student-exam-routine','ApiController\ExamRoutine\ExamRoutineController@getStudentExamRoutine');

    // Admin Side
    Route::post('/update-exam-routine','ApiController\ExamRoutine\ExamRoutineController@UpdateExamRoutine');
    Route::post('/delete-exam-routine','ApiController\ExamRoutine\ExamRoutineController@deleteExamRoutine');
    Route::post('/get-exam-routine','ApiController\ExamRoutine\ExamRoutineController@getExamRoutine');
    Route::post('/insert-exam-routine','ApiController\ExamRoutine\ExamRoutineController@InsertExamRoutine');
    Route::post('/check-exam-routine','ApiController\ExamRoutine\ExamRoutineController@checkExamRoutine');
    Route::post('/get-exam-schedule','ApiController\ExamRoutine\ExamRoutineController@getExamSchedule');
  
    // *** Route Group End ***//
});

