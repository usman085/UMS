<?php

namespace App\Http\Controllers\ApiController\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\TimeTableInterface;

class TimeTableController extends Controller
{
    protected $timeTableRepository;

    public function __construct(TimeTableInterface $TimeTableInterface)
    {
        $this->timeTableRepository=$TimeTableInterface;
    }
    
    public function getAllTimeTable()
    {
        return $this->timeTableRepository->getAllTimeTable();
    }
    
    public function checkTimeTable(Request $request)
    {
        $validator = Validator::make( $request->all(), 
        [
            'program'=>'required',
            'shift'=>'required',
            'semester'=>'required',

        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->timeTableRepository->checkTimeTable($request);
    }

    public function InserTimeTable(Request $request){
        return $this->timeTableRepository->inserTimeTable($request);   
    }
    
}
