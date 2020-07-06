<?php

namespace App\Http\Controllers\ApiController\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\CourseInterface;

class CourseController extends Controller {
    protected $courseRepository;

    /**
    * Class Constructor
    *
    * @param CourseRepository Class
    * @return void
    */

    public function __construct( CourseInterface $courseInterface ) {
        $this->courseRepository = $courseInterface;
    }
    /**
    * Insert Course
    *
    * @param Illuminate\Http\Request
    *
    * @return Response
    */

    public function insertCourse( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'course_title' => 'required',
            'course_code'=>'required',
            'credit_hours'=>'required'
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->courseRepository->insertCourse( $request );
    }

    /**
    * Get Course
    *
    *
    *
    * @return Response  All Course
    */

    public function getCourse() {
        return $this->courseRepository->getCourse();
    }

    public function delCourse( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'id' => 'required',
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return   $this->courseRepository->delCourse( $request );
    }

    public function editCourse( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'course_title' => 'required',
            'course_code'=>'required',
            'credit_hours'=>'required'
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return $this->courseRepository->editCourse( $request );
    }
}
