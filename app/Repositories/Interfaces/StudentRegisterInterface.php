<?php
namespace App\Repositories\Interfaces;

interface StudentRegisterInterface
{
    /**
    * get gender
    *
    * @param request
    * @return Response
    */

    public function getGender();

       /**
    * get guardian
    *
    * @param request
    * @return Response
    */

    public function getGuardian();


         /**
    * get shift
    *
    * @param request
    * @return Response
    */

    public function getShift();

    
         /**
    * get program
    *
    * @param request
    * @return Response
    */

    public function getAllProgram();

    public function allCountry();
           /**
    * get program
    *
    * @param request
    * @return Response
    */
     public function allCity();
    public function getBloodGroup();

     public function getStates();
    /**
    * Register Student
    *
    * @param request
    * @return Response
    */

    public function registerStudent($request);

 
}