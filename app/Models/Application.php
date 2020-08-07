<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=[
        'application_title','application_content','user_id','forward_to'
    ];
    public function getCreatedAtAttribute($value){
        return  \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
      }
}
