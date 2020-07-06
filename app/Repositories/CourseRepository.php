<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CourseInterface;
use App\Models\Course;
class CourseRepository implements CourseInterface{

    public function insertCourse($request){
           $course= Course::create($request->all());
           return response(['course'=> $course],200);
    }

    public function getCourse(){
        $allCourse=Course::all();
        return response(['courses'=>$allCourse],200);
    }
}