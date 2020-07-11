<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
     protected $fillable = [ 'user_id' ];


     /**
    *  Student  Detail belongs to user 
    * 
    *
    */

     public function user()
     {
        return $this->BelongsTo('App\Models\User');
     }


    /**
    *   student detail relationship with Student Personal Detail .
    */
    public function studentPersonalDetail()
    {
        return $this->hasOne('App\Models\StudentPersonalDetail');
    }

     /**
    *  Blood Group relationship with Student Educational Detail .
    */
    public function studentEducationalDetail()
    {
        return $this->hasOne('App\Models\StudentEducationalDetail');
    }
}
