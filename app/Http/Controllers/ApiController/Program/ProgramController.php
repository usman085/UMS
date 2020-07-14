<?php

namespace App\Http\Controllers\ApiController\Program;

use App\Repositories\Interfaces\ProgramInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProgramController extends Controller
{
    protected $programRepository;
    
    /**
    * Class Constructor
    *
    * @param programRepository Class
    * @return void
    */
    
    public function __construct(programInterface $programInterface)
    {
        $this->programRepository=$programInterface;
    }
   
    /**
    * Insert Course 
    * 
    * @param Illuminate\Http\Request
    * 
    * @return Response 
    */
    public function insertProgram(Request $request)
    {
        $validator = Validator::make( $request->all(), 
        [
            'program_title'=> 'required',
            'program_short_title'=>'required',
            'program_duration'=>'required',
            'no_of_semester'=>'required',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->programRepository->insertProgram($request);
    }  
    
    /**
    * Get program 
    * 
    * 
    * 
    * @return Response Get All program
    */
    
    public function getProgram()
    {
        return $this->programRepository->getProgram();
    }

    
    /**
    * Delete program 
    * 
    * 
    * 
    * @return Response Delete Program By Requested ID
    */

    public function deleteProgram( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);

        if ( $validator->fails() ) 
        {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        
        return   $this->programRepository->deleteProgram( $request );
    }

    /**
    * Edit program 
    * 
    * 
    * 
    * @return Response Edit Program
    */

    public function editProgram( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'program_title'=> 'required',
            'program_short_title'=>'required',
            'program_duration'=>'required',
            'no_of_semester'=>'required | number',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
            return $this->programRepository->editProgram( $request );
    }
    
    /**
    * Assigned Courses To Program
    *
    *
    *
    * @return Response  Assign Course
    */

    public function AssignCourses(Request $request)
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

            return $this->programRepository->AssignCourses($request);
    }

    /**
    * Assign Course To Program
    *
    *
    *
    * @return Response  Assign Course
    */
    
    public function AssignCourseToProgram(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'program_id'=>'required',
            'selected'=>'required',
            'semester'=>'required',

        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->programRepository->AssignCourseToProgram($request);
    }

    /**
    * Delete Course To Program
    *
    *
    *
    * @return Response  Assign Course
    */

    public function delAssignCourse(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->programRepository->delAssignCourse($request);
    }
}