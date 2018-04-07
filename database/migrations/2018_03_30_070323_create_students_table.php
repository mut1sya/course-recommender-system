<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->date('dob');
            $table->string('gender');
            $table->string('location');
            $table->string('kcse_grade');
            $table->string('kcse_points');
            $table->string('highschool');
            $table->string('year_completed');
            $table->string('personality')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('skills')->nullable();
            $table->string('interests');
            $table->integer('user_id')->unsigned()->unique();
;   
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
