<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    //
    protected $fillable=[
        'program_id','shift_id','semester','add_by'
    ];
}
