<?php

namespace App\Repositories\Interfaces;

interface NotificationInterface{
    public function getNotificationCount();

    public function getNotification();

    public function getNotificationDetail($id);
}