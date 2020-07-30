<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=[
        'application_title','application_content','user_id','forward_to'
    ];
}
