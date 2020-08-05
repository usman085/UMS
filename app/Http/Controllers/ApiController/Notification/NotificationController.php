<?php

namespace App\Http\Controllers\ApiController\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\NotificationInterface;
class NotificationController extends Controller
{
    private $notificationRepository;

    public function __construct(NotificationInterface $NotificationInterface){
         $this->notificationRepository=$NotificationInterface;
    }
    public function getNotificationCount(){
        return $this->notificationRepository->getNotificationCount();
    }

    public function getNotification(){
        return $this->notificationRepository->getNotification();
    }

    public function getNotificationDetail(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->notificationRepository->getNotificationDetail($request->id);
    }

}
