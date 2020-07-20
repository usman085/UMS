<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTableDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('teacher');
            $table->unsignedBigInteger('class_room_id');
            $table->time('startingTime');
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
        Schema::dropIfExists('time_table_details');
    }
}
