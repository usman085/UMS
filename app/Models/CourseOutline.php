<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOutline extends Model
{
   protected $fillable =['prerequisite','labs','lectures','course_id','course_outline'];
}
