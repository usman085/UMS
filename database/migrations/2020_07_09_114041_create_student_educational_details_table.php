<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEducationalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_educational_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('matric_marks');
            $table->integer('fa_marks');
            $table->string('school_name')->nullable();
            $table->string('college_name')->nullable();
            $table->string('matric_passing_year');
            $table->string('fa_passing_year');

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
        Schema::dropIfExists('student_educational_details');
    }
}
