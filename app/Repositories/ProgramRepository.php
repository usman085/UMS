<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ProgramInterface;
use App\Models\Program;

class ProgramRepository implements ProgramInterface{
    
    /**
    * Insert Program
    *
    * @param request
    * @return Response Insert Program Data
    */

    public function insertProgram($request)
    {
        $program = Program::create($request->all());
       
        return response(['Program'=> $program],200);
    }

    /**
    * Get Program
    *
    * @param request
    * @return Response Get Program Data
    */

    public function getProgram()
    {
        $getProgram = Program::all();
        
        return response(['allProgram'=>$getProgram],200);
    }

    /**
    * Delete Program
    *
    * @param request
    * @return Response Delete Program Data
    */

    public function deleteProgram( $request ) 
    {
        $deleteProgram = Program::find( $request->id )->delete();
        
        if ( $deleteProgram ) 
        {
            return response( ['deleteProgram'=>$deleteProgram], 200 );
        } 
        else 
        {
            return response( ['Server Error'=>$deleteProgram], 402 );
        }
    }

    /**
    * Assign  Course
    *
    * @param request
    * @return Response Assign Courses to Program
    */

    public function AssignCourses($request)
    {
        return Program::find($request->id)->AssignedCourses()->get();
    }
    
    /**
    * Edit Program
    *
    * @param request
    * @return Response Edit Program Data
    */

    public function editProgram( $request ) 
    {
      
        $editProgram = Program::where( 'id', $request->id )->update(
        [
            'program_title'=> $request->program_title,
            'program_short_title'=> $request->program_short_title,
            'program_duration'=>$request->program_duration,
            'no_of_semester'=>$request->no_of_semester,
        ]);

        if ( $editProgram ) 
        {
            return response( ['editProgram'=>$editProgram], 200 );
        } 
        else 
        {
            return response( ['Server Error'=>$editProgram], 402 );
        }
        
    }
    
}