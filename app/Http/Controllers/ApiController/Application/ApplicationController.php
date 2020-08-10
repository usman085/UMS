<?php

namespace App\Http\Controllers\ApiController\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
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

    public function getApplications(){
        return $this->ApplicationRepository->getApplications();
    }

    public function getAdminApplication(){
        return $this->ApplicationRepository->getAdminApplication();
    }

    public function getAdminApplicationDetail(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

        return $this->ApplicationRepository->getAdminApplicationDetail($request->id);
    }
    public function getApplicationDetail(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

        return $this->ApplicationRepository->getApplicationDetail($request->id);
    }
}
