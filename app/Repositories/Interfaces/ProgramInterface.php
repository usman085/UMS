<?php
namespace App\Repositories\Interfaces;

interface ProgramInterface
{
  /**
    * Insert program
    *
    * @param request
    * @return Response 
    */
    public function insertProgram($request);

    /**
    * Get All program
    *
    * 
    * @return Response All program
    */
    public function getProgram();

     /**
    * Assign Courses to Program
    *
    * @param request
    * @return Response  Assigned Program
    */

    public function AssignCourses($request);
    
     /**
    * Delete Program
    *
    * @param request
    * @return Response Delete Program Data
    */

    public function deleteProgram( $request );
    
     /**
    * Edit Program 
    *
    * @param request
    * @return Response  Edit Program  Data
    */

     public function editProgram( $request );


     public function AssignCourseToProgram($request);
}