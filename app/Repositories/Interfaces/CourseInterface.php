<?php
namespace App\Repositories\Interfaces;

interface CourseInterface {
    /**
    * Inster Course
    *
    * @param request
    * @return Response Insteed Data
    */

    public function insertCourse( $request );
    /**
    * Get All Course
    *
    *
    * @return Response All Courses
    */

    public function getCourse();

    public function delCourse( $request );

    public function editCourse( $request );
}