<?php

namespace  App\Repositories;

use App\Repositories\Interfaces\TimeTableInterface;
use App\Models\TimeTable;
use App\Models\User;
use App\Models\TimeTableDetail;
use App\Repositories\Interfaces\TimeTableDetailInterface;
use Auth;


use Notification;
use App\Notifications\NotificationGenrater;
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
        ->where( 'semester', $request->semester )->get();

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
        $Remove=TimeTableDetail::where('time_table_id',$request->time_table_id)->delete();
        foreach($request->timeTableData as $data){
           
            $createTimeTable=TimeTableDetail::create([
                'day'=>$data['day'],
                'course_id'=>$data['course_id'],
                'teacher'=>$data['teacher'],
                'startingTime'=>$data['startingTime'],
                'endingTime'=>$data['endingTime'],
                'class_room_id'=>$data['class_room_id'],
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
         $message=collect(['title'=>'Some Changing In time Table','body'=>'Admin Make some Change in Time Table']);
            Notification::send($users,new NotificationGenrater($message));
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

    public function TimeTableDataForStudent(){

        $user=User::with('studentOfficialDetail')->where('id',Auth::user()->id)->first();

        $data =TimeTable::with('TimeTableDetail','TimeTableDetail.course','TimeTableDetail.classRoom')->where('program_id',$user->studentOfficialDetail->program_id)
        ->where('semester',$user->studentOfficialDetail->current_semester)
        ->where('shift_id',$user->studentOfficialDetail->shift_id)->first();
        return response(['timeTable'=>$data],200);
    }
}