<?php

namespace App\Repositories;
use App\Repositories\Interfaces\TimeTableDetailInterface;
use App\Models\TimeTableDetail;
class TimeTableDetailRepository implements TimeTableDetailInterface
{
    public function InsertTimeTableDetail($request,$timeTable){
       
        foreach(json_decode($request->timeTableDetail,true) as $data){
            
        $createTimeTable=TimeTableDetail::create([
            'day'=>$data['day'],
            'course_id'=>$data['subject_id'],
            'teacher'=>$data['teacher'],
            'startingTime'=>$data['startingtime'],
            'endingTime'=>$data['endingTime'],
            'class_room_id'=>$data['classRoom_id'],
            'time_table_id'=>$timeTable->id
        ]);
        }
        return $createTimeTable;
    }
}
