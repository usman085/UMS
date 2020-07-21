<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ExamRoutineInterface;
use App\Models\ExamRoutine;
use App\Models\Program;
use DB;

class ExamRoutineRepository implements ExamRoutineInterface 
{

 /**
    * Get Exam Routine
    *
    * @param request
    * @return Response Get Exam Routine
    */

    public function getExamRoutine() 
    {
        $allExamRoutine = Program::with('examRoutine')->get();
    
        return response( ['examRoutine'=>$allExamRoutine], 200 );
    }


}