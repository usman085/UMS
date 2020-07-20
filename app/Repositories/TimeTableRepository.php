<?php

namespace  App\Repositories;

use App\Repositories\Interfaces\TimeTableInterface;
use App\Models\TimeTable;
use App\Repositories\Interfaces\TimeTableDetailInterface;

class TimeTableRepository implements TimeTableInterface {
    protected $timeTableDetail;

    public function __construct( TimeTableDetailInterface $TimeTableDetailInterface )
 {
        $this->timeTableDetail = $TimeTableDetailInterface;
    }

    public function getAllTimeTable() {
        $timeTables = TimeTable::all();
        if ( $timeTables ) {
            return response( ['timeTables'=>$timeTables], 200 );
        } else {
            return response( ['message'=>'Error'], 422 );
        }
    }

    public function checkTimeTable( $request ) {
        $timeTables = TimeTable::where( 'program_id', $request->progam )->where( 'shift_id', $request->shift )
        ->where( 'semester', $request->semester )->exists();
        return response( ['timeTables'=>$timeTables], 200 );

    }

    public function inserTimeTable( $request ) {
        $timeTable=1;
        return $this->timeTableDetail->InsertTimeTableDetail($request,$timeTable);
    }
}