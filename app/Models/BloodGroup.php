<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = ['blood_group'];

    /**
    *  Blood Group relationship with Student Personal Detail .
    */
    public function studentPersonalDetail()
    {
        return $this->hasMany('App\Models\StudentPersonalDetail');
    }
      
}
