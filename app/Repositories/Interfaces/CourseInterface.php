<?php
namespace App\Repositories\Interfaces;

interface CourseInterface{
 /**
  * Insert Course
  *
  * @param request
  * @return Response Insert Data
  */
    public function insertCourse($request);
  /**
  * Get All Course
  *
  * 
  * @return Response All Courses
  */
    public function getCourse();
}