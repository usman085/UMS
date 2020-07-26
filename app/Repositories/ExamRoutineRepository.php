<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ExamRoutineInterface;
use App\Models\ExamRoutine;
use App\Models\ExamRoutineDetail;
use App\Repositories\Interfaces\ExamRoutineDetailInterface;

use Auth;

class ExamRoutineRepository implements ExamRoutineInterface 
{
protected $examRoutineDetail;

    public function __construct( ExamRoutineDetailInterface $ExamRoutineDetailInterface )
    
    {
        $this->examRoutineDetail = $ExamRoutineDetailInterface;
    }

    public function deleteExamRoutine( $request )
    {
        $deleteExamRoutine = ExamRoutine::where( 'id',$request->id );

        $delExamId = ExamRoutineDetail::where( 'exam_routine_id', $request->id )->delete();
        
        $deleteExamRoutine =  $deleteExamRoutine->delete();  

        if( $deleteExamRoutine )
        {
            return response([ 'message'=>'success'], 200  );
        }
        else 
        {
            return response( ['message'=>'error'], 402 );
        }
    }

    public function getExamRoutine()
    
    {
        $examRoutine = ExamRoutine::with('shift','program')->get();

        if($examRoutine){
            return response(['examRoutine'=>$examRoutine],200);
        }
    }
    
    public function checkExamRoutine( $request ) 
    {
        $ExamRoutine = ExamRoutine::where( 'program_id', $request->program )->where( 'shift_id', $request->shift )
        ->where( 'semester', $request->semester )->exists();
        
        return response( ['ExamRoutine'=>$ExamRoutine], 200 );

    }
        public function InsertExamRoutine( $request ) {
       
            $examRoutine=ExamRoutine::create([
            'program_id'=>$request->program,
            'shift_id'=>$request->shift,
            'semester'=>$request->semester,
            'add_by'=>Auth::user()->id
       
            ]);
        return $this->examRoutineDetail->InsertExamRoutineDetail($request,$examRoutine);
    }

    public function getExamSchedule($id)
    {
        
        $examSchedule = ExamRoutine::with('ExamRoutineDetail.course','ExamRoutineDetail.classRoom','ExamRoutineDetail','program')->where('id',$id)->get();
        //  dd( $examSchedule);
        return response (['examSchedule' => $examSchedule ]);

    }
}