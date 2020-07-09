<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// *** Index Route Render Vue App

route::get('/get-data',function(){
    $data = App\Models\Gender::with('studentRegistration')->get();
//    $data= DB::table('student_registrations')->with('guardians')->get();
   dd($data);
});

Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');