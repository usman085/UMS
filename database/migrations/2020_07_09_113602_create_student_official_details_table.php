<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentOfficialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_official_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('program_id')->unsigned()->index();
            $table->integer('shift_id')->unsigned()->index();
            $table->integer('student_detail_id')->unsigned()->index();
            $table->string('current_semester');
            $table->string('session_year');
            $table->string('roll_no');
            $table->string('registration_no');
            
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
        Schema::dropIfExists('student_official_details');
    }
}
