<?php

namespace App\Http\Controllers\ApiController\StudentRegistration;

use App\Repositories\Interfaces\StudentRegisterInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
     protected $StudentRegisterRepository;
    
    /**
    * Class Constructor
    *
    * @param registerRepository Class
    * @return void
    */
    
    public function __construct(StudentRegisterInterface $StudentRegisterInterface)
    {
        
      $this->StudentRegisterRepository=$StudentRegisterInterface;
      
    }
   
    /**
    * Get Gender 
    * 
    * 
    * 
    * @return Response Get  Gender
    */
    
    public function getGender()
    {
        return $this->StudentRegisterRepository->getGender();
    }

    
    /**
    * Get Shift 
    * 
    * 
    * 
    * @return Response Get  Shift
    */
    
    public function getShift()
    {
        return $this->StudentRegisterRepository->getShift();
    }

    /**
    * Get BloodGroup 
    * 
    * 
    * 
    * @return Response Get  BloodGroup
    */
    
    public function getBloodGroup()
    {
        return $this->StudentRegisterRepository->getBloodGroup();
    }

     /**
    * Get All Country 
    *
    * 
    * @return All-Country
    */

    public function allCountry(){
        return $this->StudentRegisterRepository->allCountry();
    }
     /**
    * Get All Country 
    *
    * 
    * @return All-City
    */
    public function allCity(){
        return $this->StudentRegisterRepository->allCity();
    }
     /**
    * Get All States 
    *
    * 
    * @return All-States
    */
    public function getStates(){
        return $this->StudentRegisterRepository->getStates();
    }

     /**
    * Get Program 
    * 
    * 
    * 
    * @return Response Get Program 
    */
    
    public function getAllProgram()
    {
        return $this->StudentRegisterRepository->getAllProgram();
    }
    

    /**
    * Get Guardian 
    * 
    * 
    * 
    * @return Response Get  Guardian
    */
    
    public function getGuardian()
    {
        return $this->StudentRegisterRepository->getGuardian();
    }

    /**
    * register student  
    * 
    * 
    * 
    * @return Response   register student
    */
    
    public function registerStudent(Request $request)
    {
       
         $validator = Validator::make( $request->all(), 
        [
            'student_name'=> 'required',
            'father_name'=>'required',
            'gender'=>'required',
            'guardian'=>'required',
            'state'=>'required',
            'religion'=>'required',
            'phone_number'=>'required', 'regex:/^((\+)|(0))(?:[0-9] ?){6,14}[0-9]$/',
            'country'=>'required',
            'city'=>'required',
            'email'=>'required',
            'cnic'=>'required',
            'address'=>'required',
            'program'=>'required',
            'semester'=>'required',
            'shift'=>'required',
            'session_year'=>'required',
            'roll_no'=>'required',
            'reg_no'=>'required',
            'matric_marks'=>'required',
            'secondYear_marks'=>'required',
            'school_passing_year'=>'required',
            'college_passing_year'=>'required',
        ]);

        if ( $validator->fails() ) 
        {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        else
        {
         return $this->StudentRegisterRepository->registerStudent($request); 
        }
    }

}
