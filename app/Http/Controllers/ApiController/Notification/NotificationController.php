<?php

namespace App\Http\Controllers\ApiController\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\NotificationInterface;
class NotificationController extends Controller
{
    private $notificationRepository;

    /**
     * Class Constructor;
     *
     * @param NotificationInterface $NotificationInterface
     */

    public function __construct(NotificationInterface $NotificationInterface){
        $this->notificationRepository=$NotificationInterface;
    }

    /**
     * Get Notification Count
     *
     * @return Response Total Notification Value
     */

    public function getNotificationCount(){
        return $this->notificationRepository->getNotificationCount();
    }

    /**
     * Get Notification 
     *
     * @return Response All Notifications
     */

    public function getNotification(){
        return $this->notificationRepository->getNotification();
    }

    /**
     * Get Notification Detail function
     *
     * @param Request $request
     * @return response Specific Notification
     */
    
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

    /**
     * Mark Notification As Read function
     *
     * @param Request $request
     * @return response Specific Notification
     */

    public function markAsReadNotification(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->notificationRepository->markAsReadNotification($request->id);
    }

    /**
     * Delete Notification function
     *
     * @param Request $request
     * @return response Specific Notification
     */

    public function delNotification(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->notificationRepository->delNotification($request->id);
    }

    /**
     * Get Search Notification 
     *
     * @return Response Matching Data 
     */

    public function searchNotification(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'query' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
    }
}
