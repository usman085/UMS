<?php

namespace App\Http\Controllers\ApiController\ExamRoutine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ExamRoutineInterface;
use Illuminate\Support\Facades\Validator;


class ExamRoutineController extends Controller
{
protected $ExamRoutineRepository;
    
    /**
    * Class Constructor
    *
    * @param registerRepository Class
    * @return void
    */
    
    public function __construct(ExamRoutineInterface $ExamRoutineInterface)
    {
        
      $this->ExamRoutineRepository=$ExamRoutineInterface;
      
    }
     /**
    * Get Exam Routine 
    * 
    * 
    * 
    * @return Response Get  Routine
    */
    
    public function getExamRoutine()
    {
        return $this->ExamRoutineRepository->getExamRoutine( );
    }
  public function deleteExamRoutine( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return   $this->ExamRoutineRepository->deleteExamRoutine( $request );
    }
    
    public function InsertExamRoutine(Request $request)
    {
        return $this->ExamRoutineRepository->InsertExamRoutine( $request);
    }


    
    public function checkExamRoutine(Request $request)
    {
        $validator = Validator::make( $request->all(), 
        [
            'program'=>'required',
            'shift'=>'required',
            'semester'=>'required',

        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->ExamRoutineRepository->checkExamRoutine($request);
    }

    public function UpdateExamRoutine(Request $request){
        return $this->ExamRoutineRepository->UpdateExamRoutine($request);
    }
    public function getExamSchedule(Request $request)
    {
          return $this->ExamRoutineRepository->getExamSchedule($request->id);
    }
}
