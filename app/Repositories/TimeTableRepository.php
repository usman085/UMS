<?php

namespace  App\Repositories;

use App\Repositories\Interfaces\TimeTableInterface;
use App\Models\TimeTable;
use App\Models\TimeTableDetail;
use App\Repositories\Interfaces\TimeTableDetailInterface;
use Auth;
class TimeTableRepository implements TimeTableInterface {
    protected $timeTableDetail;

    public function __construct( TimeTableDetailInterface $TimeTableDetailInterface )
 {
        $this->timeTableDetail = $TimeTableDetailInterface;
    }

    public function getAllTimeTable() {
        $timeTables = TimeTable::with('shift','program')->get();
        if ( $timeTables ) {
            return response( ['timeTables'=>$timeTables], 200 );
        } else {
            return response( ['message'=>'Error'], 422 );
        }
    }

    public function checkTimeTable( $request ) {
        $timeTables = TimeTable::where( 'program_id', $request->program )->where( 'shift_id', $request->shift )
        ->where( 'semester', $request->semester )->exists();
        return response( ['timeTables'=>$timeTables], 200 );

    }
    public function TimeTableDataById($id){
        $timeTable=TimeTable::with('program','TimeTableDetail','TimeTableDetail.course','TimeTableDetail.classRoom')->where('id',$id)->get();
        return response( ['timeTable'=>$timeTable], 200 );
    }
    public function changeTimeTableStatus($id,$status){
        $timeTables = TimeTable::where('id',$id)->update(['status'=>!$status]);
        if ( $timeTables ) {
            return response( ['message'=>'Status Update'], 200 );
        } else {
            return response( ['message'=>'Error'], 422 );
        }
    }
    public function UpdateTimeTable($request){
        $createTimeTable=null;
        $Remove=null;
        foreach($request->all() as $data){
           
            $Remove=TimeTableDetail::where('time_table_id',$data['time_table_id'])->delete();

            $createTimeTable=TimeTableDetail::create([
                'day'=>$data['day'],
                'course_id'=>$data['course_id'],
                'teacher'=>$data['teacher'],
                'startingTime'=>$data['startingTime'],
                'endingTime'=>$data['endingTime'],
                'class_room_id'=>$data['classRoom_id'],
                'time_table_id'=>$data['time_table_id']
            ]);
        }
        if ( $createTimeTable != null ) {
            return response( ['message'=>'Status Update'], 200 );
        } else {
            return response( ['message'=>'Noting tp update'], 200 );
        }
        
    }
    public function inserTimeTable( $request ) {
        $timeTable=TimeTable::create([
            'program_id'=>$request->program,
            'shift_id'=>$request->shift,
            'semester'=>$request->semester,
            'add_by'=>Auth::user()->id
        ]);
        return $this->timeTableDetail->InsertTimeTableDetail($request,$timeTable);
    }
    public function delTimeTable($id){
        $timeTables = TimeTable::find($id)->delete();
        if ( $timeTables ) {
            return response( ['message'=>'Status Update'], 200 );
        } else {
            return response( ['message'=>'Error'], 422 );
        }
    }
}