<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable =['gender'];

    /**
    *  Guardian relationship with Student Personal Detail .
    */
    public function studentPersonalDetail()
    {
        return $this->hasMany('App\Models\StudentPersonalDetail');
    }
}
