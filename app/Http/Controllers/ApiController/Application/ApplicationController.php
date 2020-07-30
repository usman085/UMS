<?php

namespace App\Http\Controllers\ApiController\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Notifications\testha;
use App\Models\Application;
use Notification;
use Auth;
use App\Models\User;
class ApplicationController extends Controller
{
    
    private $ApplicationRepository;

    public function __construct(ApplicationInterface $ApplicationInterface){
            $this->ApplicationRepository = $ApplicationInterface;
    }
    public function submitApplication(Request $request){

        $ApplicationCreate=Application::create([
            'application_title'=>$request->applicationTitle,
            'application_content'=>$request->applicationContent,
            'user_id'=>Auth::user()->id,
            'forward_to'=> 5
        ]);

        $users=User::where('role',5)->get();

        $letter=collect(['title'=>'New Application','body'=> Auth::user()->name.' Send You A application']);

        Notification::send($users,new testha($letter));

        if($ApplicationCreate)
            return response(['message'=>'Send Successfully']);
            else
           return response(['message'=>'Error occurs']);
    }
}
