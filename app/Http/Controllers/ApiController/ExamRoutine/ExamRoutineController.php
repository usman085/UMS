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
    
    public function __construct(ExamRoutineInterface $ExamRoutineInterface){

    $this->ExamRoutineRepository=$ExamRoutineInterface;
    }

    /**
    * Get Exam Routine 
    * 
    * 
    * 
    * @return Response Get  Routine
    */
    
    public function getExamRoutine(){
        return $this->ExamRoutineRepository->getExamRoutine();
    }

    /**
    * Delete Exam Routine 
    * 
    * 
    * 
    * @return Response Get  Routine
    */

    public function deleteExamRoutine( Request $request ){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return   $this->ExamRoutineRepository->deleteExamRoutine( $request );
    }
    
    /**
    * Insert Exam Routine 
    * 
    * @param Request $request
    * 
    * @return Response Get  Routine
    */

    public function InsertExamRoutine(Request $request){

        return $this->ExamRoutineRepository->InsertExamRoutine( $request);
    }
    
    /**
    * Check Exam Routine 
    * 
    * @param Request $request
    * 
    * @return Response Boolean
    */

    public function checkExamRoutine(Request $request){

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

    /**
    * Update Exam Routine 
    * 
    *@param Request $request
    * 
    * @return Response Get  Routine
    */

    public function UpdateExamRoutine(Request $request){
    
        return $this->ExamRoutineRepository->UpdateExamRoutine($request);
    }
    
    /**
    * Get Exam Routine Schedule 
    * 
    * @param Request $request
    * 
    * @return Response Get  Routine
    */

    public function getExamSchedule(Request $request){

        return $this->ExamRoutineRepository->getExamSchedule($request->id);
    }

    /**
    * Get Exam Routine for Student 
    * 
    * 
    * 
    * @return Response Get  Routine
    */

    public function getStudentExamRoutine(){
        return $this->ExamRoutineRepository->getStudentExamRoutine();
    }
    
}
