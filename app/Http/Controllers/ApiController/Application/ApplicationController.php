<?php

namespace App\Http\Controllers\ApiController\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Models\Application;
use App\Notifications\NotificationGenrater;
use App\Models\User;

use Notification;
use Auth;

class ApplicationController extends Controller
{
    
    private $ApplicationRepository;
    /**
     * Class Constructor
     *
     * @param ApplicationInterface $ApplicationInterface
     * 
     */

    public function __construct(ApplicationInterface $ApplicationInterface){
            $this->ApplicationRepository = $ApplicationInterface;
    }

    /**
     * Submit Application
     *
     * @param Request $request
     * 
     * @return Response Message
     */

    public function submitApplication(Request $request){

        $ApplicationCreate=Application::create([
            'application_title'=>$request->applicationTitle,
            'application_content'=>$request->applicationContent,
            'user_id'=>Auth::user()->id,
            'forward_to'=> 5
        ]);

        $users=User::where('role',5)->get();

        if($ApplicationCreate){
            $message=collect(['title'=>'New Application','body'=> Auth::user()->name.' Send  a application']);
            Notification::send($users,new NotificationGenrater($message));
            return response(['message'=>'Send Successfully']);
        }
        else
            return response(['message'=>'Error occurs']);
    }
}
