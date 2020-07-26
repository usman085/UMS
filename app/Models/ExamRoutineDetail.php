<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamRoutineDetail extends Model
{
    protected $fillable=[
        'day','date','course_id','startingTime','endingTime','class_room_id','exam_routine_id'
    ];

    public function ExamRoutine(){
         return $this->belongsTo('App\Models\ExamRoutine');
    }
        public function course(){
        return $this->belongsTo('App\Models\Course');
    }
    public function classRoom(){
        return $this->belongsTo('App\Models\ClassRoom');
    }

    public function getDayAttribute($value){
        return  ucfirst($value);
      }
}
