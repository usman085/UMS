<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
     protected $fillable = ['shift'];

     /**
    * Shift has  many relationship with  Student Official Detail
    * 
    *
    */
    public function studentPersonalDetail()
    {
        return $this->hasMany('App\Models\StudentPersonalDetail');
    }
}
