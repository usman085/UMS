<?php
namespace App\Repositories\Interfaces;

interface CourseInterface 
{
    /**
    * Insert Course
    *
    * @param request
    * @return Response Insert Data
    */

    public function insertCourse( $request );

    /**
    * Get All Course
    *
    *
    * @return Response All Courses
    */

    public function getCourse();

    /**
    * Delete Course
    *
    * @param request
    * @return Response Delete Data
    */

    public function delCourse( $request );

    /**
    * Edit Course
    *
    * @param request
    * @return Response Edit Data
    */

    public function editCourse( $request );



    public function addCourseOutline($request);
}