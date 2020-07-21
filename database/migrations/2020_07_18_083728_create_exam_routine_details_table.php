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
            $table->string('subject');
            $table->string('day');
            $table->year('date')->nullable();
            $table->string('endingTime');
            $table->string('startingtime');
            $table->string('classRoom');

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
