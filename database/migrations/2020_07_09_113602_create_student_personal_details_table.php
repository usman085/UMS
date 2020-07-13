<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_detail_id')->unsigned()->index();
            $table->integer('guardian_id')->unsigned()->index();
            $table->integer('blood_id')->unsigned()->index()->nullable();
            $table->integer('gender_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            $table->string('student_name');
            $table->string('father_name');
            $table->year('date_of_birth')->nullable();
            $table->string('religion');
            $table->string('phone_number');
            $table->string('land_line_number')->nullable();    
            $table->string('email')->unique();     
            $table->integer('cnic')->unique(); 
            $table->string('address'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_personal_details');
    }
}
