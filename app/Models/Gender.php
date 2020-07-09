<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable =['gender'];

       /**
     * Get the Student that has the Guardian.
     */
    // public function studentRegistration()
    // {
    //     return $this->belongsTo('App\Models\StudentRegistration');
    // }
}
