<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    //
    protected $fillable=['program_id','shift_id','semester','add_by'];
    
    public function program(){
        return $this->belongsTo('App\Models\Program');
    }
    public function shift(){
        return $this->belongsTo('App\Models\Shift');
    }
    public function getCreatedAtAttribute($value){
      return  \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans(); 
    }
    public function getUpdatedAtAttribute($value){
        return  \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans(); 
      }
}
