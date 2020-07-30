<?php

namespace App\Repositories;
use App\Repositories\Interfaces\NotificationInterface;
use Auth;
class NotificationRepository implements NotificationInterface{
    public function getNotificationCount(){
      $notificationCount=  Auth::user()->unreadNotifications->count();

      return response(['notificationCount'=> $notificationCount]);

    }
}