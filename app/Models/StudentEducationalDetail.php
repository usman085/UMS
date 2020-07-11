<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEducationalDetail extends Model
{
     protected $fillable = ['student_detail_id', 'matric_marks', 'fa_marks','school_name','college_name',
    'matric_passing_year','fa_passing_year'];



    /**
    *  Student Education Detail belongs to shift 
    * 
    *
    */

       public function studentDetail()
      {
        return $this->BelongsTo('App\Models\StudentDetail');
      }
}
