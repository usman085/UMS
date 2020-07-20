<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTableDetail extends Model
{
    protected $fillable=[
        'day','course_id','teacher','startingTime','endingTime','class_room_id','time_table_id'
    ];
}
