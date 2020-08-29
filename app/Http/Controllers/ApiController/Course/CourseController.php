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
    * Delete Course
    *
    *
    *
    * @return Response  Delete Course by ID
    */

    public function delCourseOutline( Request $request ) 
    {
        $validator = Validator::make( $request->all(), 
        [
            'id' => 'required',
        ]);
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return   $this->courseRepository->delCourseOutline( $request );
    }
    /**
    * Edit Course
    *
    *@param Request $request
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

    /**
    * Add Course Oultine
    *
    * @param Request $request
    * @return void
    */

    public function addCourseOutline(Request $request){
        
        $validator = Validator::make( $request->all(), 
        [
            'prerequisite' => 'required',
            'labs'=>'required',
            'lectures'=>'required',
            'id'=>'required',
            'course_outline'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->courseRepository->addCourseOutline($request);
    }

    /**
    * Update Course Oultine
    *
    * @param Request $request
    * @return void
    */

    public function updateCourseOutline(Request $request){
        $validator = Validator::make( $request->all(), 
        [
            'prerequisite' => 'required',
            'labs'=>'required',
            'lectures'=>'required',
            'course_id'=>'required',
            'course_outline'=>'required'
        ]);
        
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }

        return $this->courseRepository->updateCourseOutline($request);
    }

    /**
    * Get  Course for student
    *
    * @param Request $request
    *
    * @return Response Current Login Student Course 
    */

    public function getCourseForStudent(){
        return $this->courseRepository->getCourseForStudent();
    }
    
}
