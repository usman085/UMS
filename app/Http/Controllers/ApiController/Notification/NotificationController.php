<?php

namespace App\Http\Controllers\ApiController\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

}
