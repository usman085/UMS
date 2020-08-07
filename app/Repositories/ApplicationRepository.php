<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Models\Application;
use Auth;
class ApplicationRepository implements ApplicationInterface{

    public function getApplications(){
            $application = Auth::user()->applications->take(50);

        return response(['applications'=>$application],200);
    }

    public function getApplicationDetail($id){
        $application= Application::find($id);
        return response(['application'=>$application]);
    }
}