<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CourseInterface;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\User;
use Auth;
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
        $allCourse = Course::with('coursesOutline')->get();
    
        return response( ['courses'=>$allCourse], 200 );
    }

    //  public function getCourseOutline(Request $request) 
    // {
    //     return $request->all();

    //     return response( ['courseDetail'=>$allCourse], 200 );
    // }

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

     /**
    * Del Course Outline
    *
    * @param request
    * @return Response Del Course Program Data
    */

    public function delCourseOutline( $request ) {
        
        $delCourseOutline = CourseOutline::find($request->id );
        
        $delCourseId = Course::where('id', $delCourseOutline->course_id )->update([
            'course_outline'=>0

         ]);
         $delCourseOutline =  $delCourseOutline->delete();            
        if ( $delCourseOutline && $delCourseId) 
        {
        return response( ['message'=>'success'], 200 ); 
        } 
        else 
        {
        return response( ['message'=>'error'], 402 );
        }
    }

    public function updateCourseOutline($request){
        $updateCourseOutline=CourseOutline::where('id',$request->id)->update(
        [
            'prerequisite'=>$request->prerequisite,
            'labs'=>$request->labs,
            'lectures'=>$request->lectures,
            'course_outline'=>$request->course_outline,
        ]);
        if($updateCourseOutline){
           return response(['message'=>'Update Successfully'],200);
        }
        else{
            return response(['message'=>'error'],200);
        }
    }
    public function addCourseOutline($request){
           
        $addCourseOutline=CourseOutline::create([
            'prerequisite'=>$request->prerequisite,
            'labs'=>$request->labs,
            'lectures'=>$request->lectures,
            'course_outline'=>$request->course_outline,
            'course_id'=>$request->id
        ]);
        $courseUpdate=Course::where('id',$request->id)->update([
            'course_outline'=>1
        ]);
        if($addCourseOutline && $courseUpdate){
            return response(['message'=>'Add Successfully'],200);
        }
        else{
            return response(['message'=>'error'],200);
        }
    }

    public function getCourseForStudent(){
        $course=User::with('studentOfficalDetail.program.AssignedCourses.coursesOutline')
        ->where('id',Auth::user()->id)->first();

        if($course){
            return response(['course'=> $course->studentOfficalDetail->program,'currentSemester'=>$course->studentOfficalDetail->current_semester],200);
        }
        else{
            return response(['message'=>'error'],200);
        }
        
    }
}