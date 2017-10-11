<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoursesLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lectures', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('lecture_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('lectures');
            $table->foreign('lecture_id')->references('id')->on('courses');
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
        Schema::dropIfExists('courses_lectures');
    }
}
