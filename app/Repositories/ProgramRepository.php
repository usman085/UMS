<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ProgramInterface;
use App\Models\Program;

class ProgramRepository implements ProgramInterface{
    
    public function insertProgram($request)
    {
        $program= Program::create($request->all());
        return response(['Program'=> $program],200);
    }
    public function getProgram()
    {
        $getProgram=Program::all();
        return response(['allProgram'=>$getProgram],200);
    }
    public function deleteProgram( $request ) {
        $deleteProgram = Program::find( $request->id )->delete();
        if ( $deleteProgram ) {
            return response( ['deleteProgram'=>$deleteProgram], 200 );
        } else {
            return response( ['Server Error'=>$deleteProgram], 402 );
        }
    }
    public function AssignCourses($request){
        return Program::find($request->id)->AssignedCourses()->get();
    }
    public function editProgram( $request ) {
      
        $editProgram = Program::where( 'id', $request->id )->update( [
            'program_title'=> $request->program_title,
            'program_short_title'=> $request->program_short_title,
            'program_duration'=>$request->program_duration,
            'no_of_semester'=>$request->no_of_semester,
        ] );
        if ( $editProgram ) {
            return response( ['editProgram'=>$editProgram], 200 );
        } else {
            return response( ['Server Error'=>$editProgram], 402 );
        }
        
    }
    
}