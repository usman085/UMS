<?php

namespace App\Http\Controllers\ApiController\Application;

use App\Repositories\Interfaces\ApplicationInterface;
use App\Notifications\NotificationGenrater;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
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
     * Update Application Status and genrate notification
     *
     * @param Request $request
     * 
     * @return Response Message
     */

    public function updateStatus(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required',
            'status'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

        return $this->ApplicationRepository->updateStatus($request);
    }

    /**
     * Submit Application
     *
     * @param Request $request
     * @return Response & Genter Notifications
     */

    public function submitApplication(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'application_title'=>$request->applicationTitle,
            'application_content'=>$request->applicationContent,
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

        return $this->ApplicationRepository->submitApplication($request);
    }

    /**
     * Get Applications
     *
     * @param Request $request
     * @return Response & All applications
     */

    public function getApplications(){
        return $this->ApplicationRepository->getApplications();
    }

    /**
     * Get Admin Application
     *
     * @param Request $request
     * @return Response & All Application Regarding Admins
     */

    public function getAdminApplication(){

        return $this->ApplicationRepository->getAdminApplication();
    }

    /**
     * Get Admin Application Detail
     *
     * @param Request $request
     * @return Response with Applicant detail
     */
    
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

    /**
     * GEt Application Detail
     *
     * @param Request $request
     * @return response Applicants Sent Detail
     */
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
