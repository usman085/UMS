<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
protected $fillable = [ 'program_title','shift_id','semester'];

   /**
    *  Exam Routine belongs to Program 
    * 
    *
    */
      public function program()
      {
        return $this->BelongsTo('App\Models\Program');
      }

}
