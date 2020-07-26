<?php
namespace App\Repositories\Interfaces;

interface TimeTableInterface
{

   public function getAllTimeTable();

   public function checkTimeTable($request);

   public function inserTimeTable($request);

   public function TimeTableDataById($id);

   public function changeTimeTableStatus($id,$status);

   public function delTimeTable($id);

   public function UpdateTimeTable($request);
}