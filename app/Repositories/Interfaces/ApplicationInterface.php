<?php


namespace App\Repositories\Interfaces;

interface ApplicationInterface{

    public function getApplications();

    public function getApplicationDetail($id);

    public function getAdminApplication();

    public function getAdminApplicationDetail($id);

    public function updateStatus($data);
}