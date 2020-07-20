<?php

namespace  App\Repositories;

use App\Repositories\Interfaces\TimeTableInterface;
use App\Models\TimeTable;

class TimeTableRepository implements TimeTableInterface {

    public function getAllTimeTable(){
        $timeTables=TimeTable::all();
        if($timeTables){
            return response(['timeTables'=>$timeTables],200);
        }
        else{
            return response(['message'=>'Error'],422);
        }
    }
    public function checkTimeTable($request){
        $timeTables=TimeTable::where('program_id',$request->progam)->where('shift_id',$request->shift)
        ->where('semester',$request->semester)->exists();
       
            return response(['timeTables'=>$timeTables],200);
       
            
        
    }
}