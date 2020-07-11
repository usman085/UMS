<?php

namespace App\Http\Controllers\ApiController\Course;

use App\Repositories\Interfaces\CourseInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CourseController extends Controller 
{
    protected $courseRepository;

    /**
    * Class Constructor
    *
    * @param CourseRepository Class
    * @return void
    */

    public function __construct( CourseInterface $courseInterface ) 
    {
    
        $this->courseRepository = $courseInterface;
    
    }
    /**
    * Insert Course
    *
    * @param Illuminate\Http\Request
    *
    * @return Response
    */

    public function insertCourse( Request $request ) 
    {
        $validator = Validator::make( $request->all(), [
            'course_title' => 'required',
            'course_code'=>'required',
            'credit_hours'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
            return $this->courseRepository->insertCourse( $request );
    }

    /**
    * Get Course
    *
    * @return Response  All Course
    */

    public function getCourse() 
    {
        return $this->courseRepository->getCourse();
    }
    /**
    * Delete Course
    *
    *
    *
    * @return Response  Delete Course by ID
    */

    public function delCourse( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
            return   $this->courseRepository->delCourse( $request );
    }
    
    /**
    * Edit Course
    *
    *
    *
    * @return Response  Edit Course
    */

    public function editCourse( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'course_title' => 'required',
            'course_code'=>'required',
            'credit_hours'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        
            return $this->courseRepository->editCourse( $request );
    }
    public function addCourseOutline(Request $request){
       return $this->courseRepository->addCourseOutline($request);
    }
}
