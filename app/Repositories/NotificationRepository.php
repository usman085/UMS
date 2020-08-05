<?php

namespace App\Repositories;
use App\Repositories\Interfaces\NotificationInterface;
use Auth;
class NotificationRepository implements NotificationInterface{

    public function getNotificationCount(){
      $notificationCount=  Auth::user()->unreadNotifications->count();
      return response(['notificationCount'=> $notificationCount]);

    }
    public function getNotificationDetail($id){
      $notification = Auth::user()->notifications->where('id',$id)->first();
      $notification->markAsRead();
       $data['notification'] = $notification->data['message'];
       $data['send_at']= \Carbon\Carbon::parse($notification->created_at)->format('D-m-Y');
      return response(['notification'=> $data]);
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