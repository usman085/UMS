<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id_a')->unsigned()->index();
            $table->integer('team_id_b')->unsigned()->index();
            $table->integer('venue_id')->unsigned();
            $table->string('Day',20);
            $table->dateTime('Date');
            $table->dateTime('Time');
            $table->timestamps();
        });
        // Schema::table('schedules', function(Blueprint $table) {
        //     $table->foreign('team_id_a')->references('id')->on('teams');
        //     $table->foreign('team_id_b')->references('id')->on('teams');
        //     // $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
