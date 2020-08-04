<?php

namespace App\Http\Controllers\ApiController\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\TimeTableInterface;

class TimeTableController extends Controller
{
    protected $timeTableRepository;

    /**
     * Class Constructor
     * @param TimeTableInterface
     * 
     */
    public function __construct(TimeTableInterface $TimeTableInterface){
        $this->timeTableRepository=$TimeTableInterface;
    }

    /**
     * Get All TimeTable
     * @param Null
     * 
     * @return All-TimeTable
     */
    
    
    public function getAllTimeTable()
    {

        return $this->timeTableRepository->getAllTimeTable();
    }
     /**
     * Get All TimeTable
     * @param Id
     * 
     * @return TimeTable-Specfic-ID
     */
    public function TimeTableDataById(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->timeTableRepository->TimeTableDataById($request->id);
    } 

    /**
     * Check TimeTable is Exists Or not
     * @param Program-Shift-Semester
     * 
     * @return TimeTable-Specfic-ID
     */

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

     /**
     * Update TimeTable 
     * @param Request $request
     * 
     * @return Response Success Message or Error
     */

    public function UpdateTimeTable(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'timeTableData'=>'required',
            'time_table_id'=>'required',
        ]);
            
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->timeTableRepository->UpdateTimeTable($request);
    }

    /**
     * Insert TimeTable 
     * @param Request $request
     * 
     * @return Response Add Or not
     */

    public function InserTimeTable(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'program'=>'required',
            'semester'=>'required',
            'shift'=>'required',
            'timeTableDetail'=>'required',
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        
        return $this->timeTableRepository->inserTimeTable($request);   
    }
     /**
     * Change Status  TimeTable 
     * @param Request $request
     * 
     * @return Response Change Message  Or Error
     */
    public function changeTimeTableStatus(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required',
            'status'=>'required'
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->timeTableRepository->changeTimeTableStatus($request->id,$request->status);
    }
     /**
     * Insert TimeTable 
     * @param Request $request
     * 
     * @return Response Del Or not
     */
    public function delTimeTable(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'id'=>'required'
        ]);

        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->timeTableRepository->delTimeTable($request->id);
    }
    

    public function TimeTableDataForStudent(){
        return $this->timeTableRepository->TimeTableDataForStudent();
    }
}
