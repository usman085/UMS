<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// *** Passport Package Used
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable 
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'name', 'email', 'password','role'
    ];

    /**
    *   User Has Many relationship with Student Detail .
    */
    public function studentDetail()
    {
        return $this->hasOne('App\Models\StudentDetail');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
    [
        'password', 'remember_token',
    ];

    /**
    *  Student  Detail belongs to user 
    * 
    *
    */

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }


   /**
   *   student detail relationship with Student Personal Detail .
   */
   public function studentPersonalDetail()
   {
       return $this->hasOne('App\Models\StudentPersonalDetail');
   }

   public function studentOfficalDetail()
   {
       return $this->hasOne('App\Models\StudentOfficialDetail');
   }
    /**
   *  Blood Group relationship with Student Educational Detail .
   */
   public function studentEducationalDetail()
   {
       return $this->hasOne('App\Models\StudentEducationalDetail');
   }
}
