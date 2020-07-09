<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
     protected $fillable =[ 'id','guardian_name'];

       /**
     * Get the Student that has the Guardian.
     */
    // public function studentRegistration()
    // {
    //     return $this->belongsTo('App\Models\StudentRegistration');
    // }
}
