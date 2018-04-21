<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('researcher_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('verifier_id')->unsigned();
            $table->string('message');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('researcher_id')->references('id')->on('researchers')->onDelete('cascade');
            $table->foreign('verifier_id')->references('id')->on('verifiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_histories');
    }
}
