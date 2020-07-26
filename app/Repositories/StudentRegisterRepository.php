<?php
namespace App\Repositories;

use App\Repositories\Interfaces\StudentRegisterInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentEducationalDetail;
use App\Models\StudentPersonalDetail;
use App\Models\StudentOfficialDetail;
use App\Models\State;
use App\Models\City;
use App\Models\BloodGroup;
use App\Models\Guardian;
use App\Models\Program;
use App\Models\Gender;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use App\Models\Country;
use DB;

class StudentRegisterRepository implements StudentRegisterInterface {

    /**
    * Insert Student record
    *
    * @param request
    * @return Response Insert Student record
    */

    public function registerStudent( $request )
    {
     
     /**
    *  DB::beginTransaction() prevents to add record if exception occur 
    * 
    */
     DB::beginTransaction();
     try 
     {
      $user=User::create([
        'name'=>$request->student_name,
        'email'=>$request->user_name,
        'password'=>Hash::make($request->password),
        'role'=>'0'
      ]);
      

       
      $StudentPersonalDetail=StudentPersonalDetail::create([
        'user_id'=>$user->id,
        'guardian_id' =>$request->guardian,
        'blood_id' =>$request->bloodGroup,
        'gender_id' =>$request->gender,
        'country_id' =>'5',
        'city_id' =>'4',
        'state_id'=>$request->state,
        'student_name' =>$request->student_name,
        'father_name' =>$request->father_name,
        'date_of_birth' => Carbon::parse($request->dateofBirth)->format('Y-m-d'),
        'religion' =>$request->religion,
        'phone_number' =>$request->phone_number,
        'land_line_number' =>$request->land_line_number,
        'email' =>$request->email,
        'cnic' =>$request->cnic,
        'address' =>$request->address,    
        ]);

        $StudentOfficialDetail=StudentOfficialDetail::create([
        
        'user_id'=>$user->id,
        'program_id' =>$request->program,
        'shift_id' =>$request->shift,
        'current_semester' =>$request->semester,
        'session_year' =>$request->session_year,
        'roll_no' =>$request->roll_no,
        'registration_no' =>$request->reg_no,
           
        ]);

        $StudentEducationalDetail=StudentEducationalDetail::create([ 
          'user_id'=>$user->id,
        'matric_marks' =>$request->matric_marks,
        'fa_marks' =>$request->secondYear_marks,
        'school_name' =>$request->school,
        'college_name' =>$request->college,
        'matric_passing_year' =>$request->school_passing_year,
        'fa_passing_year' =>$request->college_passing_year,
        ]);
        DB::commit();
        return response( ['register'=> $user], 200 );
     }
     catch(\Exception $ex){
        DB::rollback();
        return response( ['register'=> $ex], 200 );
     }  
        
    }

    /**
    * Get Gender 
    *
    * @param request
    * @return Response Get Gender 
    */

    public function getGender()
    {
           $data = Gender::select('gender','id')->get()->toArray();

            return  response( ['data'=> $data], 200 );
    }

    
    /**
    * Get Blood Group 
    *
    * @param request
    * @return Response Get Gender 
    */

    public function getBloodGroup()
    {
           $data = BloodGroup::select('blood_group','id')->get()->toArray();

            return  response( ['data'=> $data], 200 );
    }

    
    /**
    * Get Shift 
    *
    * @param request
    * @return Response Get Shift 
    */

    public function getShift()
    {
           $data = Shift::select('Shift','id')->get();

            return  response( ['data'=> $data], 200 );
    }
    
     
    /**
    * Get program 
    *
    * @param request
    * @return Response Get program 
    */
    
    public function getAllProgram()  
    {
           $data = Program::select('program_title','id')->get();

            return  response( ['data'=> $data], 200 );
    }
    
    public function getStates()
    {
      $data=State::all();
      return response(['states'=>$data],200);
    }
    
    public function allCountry()
    {
      $data=Country::all();
      return response(['counties'=>$data],200);
    }

    public function allCity()
    {
      $data=City::all();
      return response(['cities'=>$data],200);
    }
    /**
    * Get Guardian 
    *
    * @param request
    * @return Response Get Gender 
    */

    public function getGuardian()
    {
           $data = Guardian::all();

            return  response( ['data'=> $data], 200 );
    }
}