<?php

namespace App\Http\Controllers\ApiController\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\ProgramInterface;
use App\Models\Program;
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
        return $this->programRepository->insertProgram($request);
    }  /**
     * Get program 
     * 
     * 
     * 
     * @return Response  All program
     */
    public function getProgram()
    {
        return $this->programRepository->getProgram();
    }

    public function deleteProgram( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return   $this->programRepository->deleteProgram( $request );
    }
      public function editProgram( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'program_title'=> 'required',
            'program_short_title'=>'required',
            'program_duration'=>'required',
            'no_of_semester'=>'required',
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->programRepository->editProgram( $request );
    }
    public function AssignCourses(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->programRepository->AssignCourses($request);
    }
}