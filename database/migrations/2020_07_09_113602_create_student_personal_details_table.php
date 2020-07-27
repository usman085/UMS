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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('blood_id')->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('student_name');
            $table->string('father_name');
            $table->date('date_of_birth')->nullable();
            $table->string('religion');
            $table->string('phone_number');
            $table->string('land_line_number')->nullable();    
            $table->string('email');     
            $table->string('cnic')->unique(); 
            $table->string('address'); 
            
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');


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
