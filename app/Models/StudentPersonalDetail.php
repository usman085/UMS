<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPersonalDetail extends Model
{
      protected $fillable = ['student_detail_id','guardian_id','blood_id','gender_id','country_id','city_id',
    'student_name','father_name','date_of_birth','religion','phone_number','land_line_number','email','cnic',
    'address'];


    public function guardian()
    {
        return $this->belongsTo('App\Models\Guardian');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

     public function bloodGroup()
    {
        return $this->belongsTo('App\Models\BloodGroup');
    }

      public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

      public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
