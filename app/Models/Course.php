<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     /**
     *  All attributes  must  have value 
     *
     * @var array
     */

    protected $fillable = 
    [
        'course_code', 'course_title', 'credit_hours','course_outline'
    ];

    /**
     * RelationShip Course Has Many Programs 
     */

    public function AssignToProgram()
    {
        
        return $this->belongsToMany('App\Models\Program');
    }
    public function coursesOutline(){
        return $this->hasOne('App\Models\CourseOutline');
    }

      public function studentOfficialDetail()
    {
        return $this->hasMany('App\Models\StudentOfficialDetail');
    }
}
