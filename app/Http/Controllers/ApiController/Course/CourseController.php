<?php

namespace App\Http\Controllers\ApiController\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CourseInterface;
class CourseController extends Controller
{
    protected $courseRepository;
    
    /**
     * Class Constructor
     *
     * @param CourseRepository Class
     * @return void
     */
    public function __construct(CourseInterface $courseInterface)
    {
        $this->courseRepository=$courseInterface;
    }
    /**
     * Insert Course 
     * 
     * @param Illuminate\Http\Request
     * 
     * @return Response 
     */
    public function insertCourse(Request $request){
            return $this->courseRepository->insertCourse($request);
    }

    /**
     * Get Course 
     * 
     * 
     * 
     * @return Response  All Course
     */
    public function getCourse(){
        return $this->courseRepository->getCourse();
}
}
