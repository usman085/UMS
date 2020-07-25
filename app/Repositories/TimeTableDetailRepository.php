<?php

namespace App\Repositories;
use App\Repositories\Interfaces\TimeTableDetailInterface;
use App\Models\TimeTableDetail;
class TimeTableDetailRepository implements TimeTableDetailInterface
{
    public function InsertTimeTableDetail($request,$timeTable){
        $createTimeTable=null;
        foreach(json_decode($request->timeTableDetail,true) as $data){
            
        $createTimeTable=TimeTableDetail::create([
            'day'=>$data['day'],
            'course_id'=>$data['subject_id'],
            'teacher'=>$data['teacher'],
            'startingTime'=>$data['startingTime'],
            'endingTime'=>$data['endingTime'],
            'class_room_id'=>$data['class_room_id'],
            'time_table_id'=>$timeTable->id
        ]);
        }
        return $createTimeTable;
    }
}
