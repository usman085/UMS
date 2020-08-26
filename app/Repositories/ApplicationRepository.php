<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Models\Application;
use Auth;
class ApplicationRepository implements ApplicationInterface{

    public function getApplications(){
            $application = Auth::user()->applications()->paginate(15);
            
        return response(['applications'=>$application],200);
    }

    public function getApplicationDetail($id){
        $application= Application::find($id);
        return response(['application'=>$application]);
    }

    public function getAdminApplication(){
        $application= Application::where('forward_to',5)->orderBy('created_at','desc')->get();
        return response(['applications'=>$application]);
    }

    public function getAdminApplicationDetail($id){
        $application= Application::with('userDetail.studentOfficialDetail.program','userDetail.studentOfficialDetail.shift')->where('id',$id)->first();
        return response(['applications'=>$application]);
    }
}