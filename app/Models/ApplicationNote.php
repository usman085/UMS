<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationNote extends Model
{
  protected $fillable=['note','add_by_id','application_id'];
    
}
