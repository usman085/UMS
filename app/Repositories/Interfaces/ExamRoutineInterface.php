<?php
namespace App\Repositories\Interfaces;

interface ExamRoutineInterface
{
        /**
    * Get All exam routine
    *
    *
    * @return Response All exam routine
    */
    public function UpdateExamRoutine($request);

    public function getExamSchedule($id);
    
    public function deleteExamRoutine($request);

    public function getExamRoutine();

    public function checkExamRoutine($request);

    public function InsertExamRoutine($request);
}