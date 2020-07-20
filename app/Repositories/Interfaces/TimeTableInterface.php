<?php
namespace App\Repositories\Interfaces;

interface TimeTableInterface
 {

    public function getAllTimeTable();
       public function checkTimeTable($request);
}