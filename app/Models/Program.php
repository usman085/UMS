<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
       'program_title','program_short_title','program_duration','no_off_semester','courses_assign' 
    ];
}
