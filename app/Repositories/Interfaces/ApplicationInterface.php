<?php


namespace App\Repositories\Interfaces;

interface ApplicationInterface{

    public function getApplications();

    public function getApplicationDetail($id);
}