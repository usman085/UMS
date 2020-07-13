<?php
namespace App\Repositories;

use App\Repositories\Interfaces\StudentRegisterInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentEducationalDetail;
use App\Models\StudentPersonalDetail;
use App\Models\StudentOfficialDetail;
use App\Models\StudentDetail;
use App\Models\BloodGroup;
use App\Models\Guardian;
use App\Models\Program;
use App\Models\Gender;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Hash;
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
      
      $StudentDetail=StudentDetail::create([
        'user_id'=>$user->id
        ]);
        
      $StudentPersonalDetail=StudentPersonalDetail::create([
        'student_detail_id' =>$StudentDetail->id,
        'guardian_id' =>$request->guardian,
        'blood_id' =>$request->bloodGroup,
        'gender_id' =>$request->gender,
        'country_id' =>'5',
        'city_id' =>'4',
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
        
        'student_detail_id' =>$StudentDetail->id,
        'program_id' =>$request->program,
        'shift_id' =>$request->shift,
        'current_semester' =>$request->semester,
        'session_year' =>$request->session_year,
        'roll_no' =>$request->roll_no,
        'registration_no' =>$request->reg_no,
           
        ]);

        $StudentEducationalDetail=StudentEducationalDetail::create([
        
        'student_detail_id' =>$StudentDetail->id,
        'matric_marks' =>$request->matric_marks,
        'fa_marks' =>$request->secondYear_marks,
        'school_name' =>$request->school,
        'college_name' =>$request->college,
        'matric_passing_year' =>$request->school_passing_year,
        'fa_passing_year' =>$request->college_passing_year,
           
        ]);
        DB::commit();
     }
     catch(\Exception $ex){
        DB::rollback();
        throw $ex;
     }  
        return response( ['register'=> $user], 200 );
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
     public function getAllProgram()  {
           $data = Program::select('program_title','id')->get();

            return  response( ['data'=> $data], 200 );
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