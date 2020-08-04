<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentOfficialDetail extends Model
{
      protected $fillable = ['program_id','shift_id','user_id','current_semester','session_year','roll_no',
      'registration_no'];

      /**
    *  Student Official Detail belongs to Program 
    * 
    *
    */
      public function program()
      {
        return $this->BelongsTo('App\Models\Program');
      }

       public function course()
      {
        return $this->BelongsTo('App\Models\Course');
      }

      public function AssignedCourses()
    {
        return $this->belongsToMany('App\Models\Course')->withPivot('semester')->withPivot('id');
    }
      /**
    *  Student Official Detail belongs to shift 
    * 
    *
    */

      public function shift()
      {
        return $this->BelongsTo('App\Models\Shift');
      }

          /**
    *  Student Official Detail belongs to shift 
    * 
    *
    */

     
}
