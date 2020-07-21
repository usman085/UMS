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
        return $this->ExamRoutineRepository->getExamRoutine();
    }

}
