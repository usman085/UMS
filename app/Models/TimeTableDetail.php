<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTableDetail extends Model
{
    protected $fillable=[
        'day','course_id','teacher','startingTime','endingTime','class_room_id','time_table_id'
    ];
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
