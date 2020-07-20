<?php

namespace App\Repositories;
use App\Repositories\Interfaces\TimeTableDetailInterface;
class TimeTableDetailRepository implements TimeTableDetailInterface
{
    public function InsertTimeTableDetail($request,$timeTable){
        return $request->all();
    }
}
