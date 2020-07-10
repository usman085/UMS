<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CourseInterface;
use App\Models\Course;

class CourseRepository implements CourseInterface 
{
    
    /**
    * Insert Course
    *
    * @param request
    * @return Response Insert Course Data
    */

    public function insertCourse( $request ) 
    {
        $course = Course::create( $request->all() );
    
        return response( ['course'=> $course], 200 );
    }

    /**
    * Get Course
    *
    * @param request
    * @return Response Get Course Data
    */

    public function getCourse() 
    {
        $allCourse = Course::all();
    
        return response( ['courses'=>$allCourse], 200 );
    }

    /**
    * Edit Course
    *
    * @param request
    * @return Response Edit Course Data
    */

    public function editCourse( $request ) 
    {
        $editCourse = Course::where( 'id', $request->id )->update( 
        [
            'course_title' => $request->course_title,
            'course_code'  => $request->course_code,
            'credit_hours' => $request->credit_hours
        ]);

        if ( $editCourse ) {
            return response( ['editCourse'=>$editCourse], 200 );
        } 
        else {
            return response( ['Server Error'=>$editCourse], 402 );
        }
    }
    /**
    * Del Course
    *
    * @param request
    * @return Response Del Course Program Data
    */

    public function delCourse( $request ) {
        $delCourse = Course::find( $request->id )->delete();
        if ( $delCourse ) {
            return response( ['message'=>$delCourse], 200 );
        } else 
        {
            return response( ['message'=>$delCourse], 402 );
        }
    }
}