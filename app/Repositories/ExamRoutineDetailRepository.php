<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ExamRoutineDetailInterface;
use App\Models\ExamRoutineDetail;

class ExamRoutineDetailRepository implements ExamRoutineDetailInterface


{
    public function InsertExamRoutineDetail($request,$examRoutine){
       
        foreach(json_decode($request->examRoutineDetail,true) as $data){
            
        $createExamRoutine=ExamRoutineDetail::create([
            'day'=>$data['day'],
            'course_id'=>$data['subject_id'],
            'date'=>$data['date'],
            'startingTime'=>$data['startingtime'],
            'endingTime'=>$data['endingTime'],
            'class_room_id'=>$data['classRoom_id'],
            'exam_routine_id'=>$examRoutine->id
        ]);
        }
        return $createExamRoutine;
    }
}
