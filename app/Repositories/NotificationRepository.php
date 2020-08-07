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
      $notification= Auth::user()->notifications->take(25)->map(function($notification){
        return[
          'id'=>$notification->id,
          'read_status'=>$notification->read_at,
          'notification'=>$notification->data['message'],
          'send_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()
        ];
      });
      
      return response(['notification'=> $notification]);
    }

    public function markAsReadNotification($id){
      $notification = Auth::user()->notifications->where('id',$id)->first();
      $notification->markAsRead();
      return response(['message'=> 'Successfuly done']);
    }

    
    public function delNotification($id){
      $notification = Auth::user()->notifications->where('id',$id)->first()->delete();
      return response(['message'=> 'Successfuly done']);
    }
}