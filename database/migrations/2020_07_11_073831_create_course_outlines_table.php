<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOutlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_outlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prerequisite');
            $table->integer('labs');
            $table->integer('lectures');
            $table->unsignedBigInteger('course_id');
            $table->text('course_outline');
            $table->timestamps();

             /**
             * Foreign Key Constraints
             */

            $table->foreign('course_id')->references('id')->on('courses') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_outlines');
    }
}
