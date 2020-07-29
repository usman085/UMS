<?php

namespace App\Http\Controllers\ApiController\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApplicationInterface;
class ApplicationController extends Controller
{
    //
    protected $ApplicationRepository;

    public function __construct(ApplicationInterface $ApplicationInterface){
            $this->ApplicationRepository=$ApplicationInterface;
    }
    public function submitApplication(Request $request){
     
        return $request->all();
    }
}
