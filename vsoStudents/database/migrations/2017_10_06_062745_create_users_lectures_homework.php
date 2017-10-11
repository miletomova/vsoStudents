<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLecturesHomework extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lectures_homework', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('lecture_id')->unsigned();
            $table->foreign('lecture_id')->references('id')->on('lectures');
            $table->foreign('user_id')->references('id')->on('users');  
            //COMPOSITE PRIMARY KEY
            //doesn`t guarantee uniqueness!?    
            $table->primary(array('user_id', 'lecture_id'));
            //
            //The second param is to manually set the name of the unique index. 
            //Use an array as the first param to create a unique key across multiple columns.
            //$table->unique(array('lecture_id', 'user_id'), 'user_lecture');
            $table->string('homework_path');
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
        Schema::dropIfExists('users_lectures_homework');
    }
}
