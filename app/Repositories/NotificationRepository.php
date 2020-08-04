<?php

namespace App\Repositories;
use App\Repositories\Interfaces\NotificationInterface;
use Auth;
class NotificationRepository implements NotificationInterface{

    public function getNotificationCount(){
      $notificationCount=  Auth::user()->unreadNotifications->count();
      return response(['notificationCount'=> $notificationCount]);

    }

    public function getNotification(){
      $notification= Auth::user()->notifications->map(function($notification){
        return[
          'id'=>$notification->id,
          'read_status'=>$notification->read_at,
          'notification'=>$notification->data['message'],
          'send_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()
        ];
      });
      
      return response(['notification'=> $notification]);
    }
}