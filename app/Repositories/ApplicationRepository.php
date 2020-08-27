<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ApplicationInterface;
use App\Models\Application;
use App\Models\ApplicationNote;
use Notification;
use App\Notifications\NotificationGenrater;
use Auth;
use DB;
class ApplicationRepository implements ApplicationInterface{

    public function getApplications(){
            $application = Auth::user()->applications()->paginate(15);
            
        return response(['applications'=>$application],200);
    }

    public function getApplicationDetail($id){
        $application= Application::with('applicationNote')->find($id);
        return response(['application'=>$application]);
    }

    public function updateStatus($data){
            DB::beginTransaction();
            //
            $application= Application::where('id',$data->id)->update(['status'=>$data->status]);

            if(ApplicationNote::where('application_id',$data->id)->first()){

                $noteCreated=ApplicationNote::where('application_id',$data->id)->update([
                    'note'=>$data->application_note,
                    'add_by_id'=>Auth::user()->id
                ]);

            }else{
                
                $noteCreated=ApplicationNote::create([
                    'application_id'=> $data->id,
                    'note'=>$data->application_note,
                    'add_by_id'=>Auth::user()->id
                ]);
            }
        if(!$application || !$noteCreated ){
                DB::rollback();
                return response(['message'=>'Some thing wrong']);
            } else {
            // Else commit the queries
                DB::commit();

                //*** Notification Genrate Regarding Applicant */
                $app= Application::where('id',$data->id)->with('Applicant')->first();
                $message=collect(['title'=>'Your Application is '.ucfirst($data->status), 'body'=>
                'Your Application Regarding '.$app->application_title.' is '.$data->status
                ]); 
                Notification::send($app->Applicant,new NotificationGenrater($message));

                return response(['message'=>'Application Update Successfully','test'=>$app]);
            }
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