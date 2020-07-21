<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ClassRoomInterface;
use App\Models\ClassRoom;
class ClassRoomRepository implements ClassRoomInterface{
    public function getAllClassRoom(){
        $rooms=ClassRoom::all();
        return response(['rooms'=>$rooms],200);
    }
}