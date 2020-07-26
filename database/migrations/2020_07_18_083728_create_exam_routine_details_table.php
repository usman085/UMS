<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRoutineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_routine_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('date');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('class_room_id');
            $table->time('startingTime');
            $table->unsignedBigInteger('exam_routine_id');
            $table->time('endingTime');
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
        Schema::dropIfExists('exam_routine_details');
    }
}
