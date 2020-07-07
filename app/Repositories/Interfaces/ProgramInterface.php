<?php
namespace App\Repositories\Interfaces;

interface ProgramInterface{
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

    public function deleteProgram( $request );

    public function editProgram( $request );
}