<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('category');
            $table->string('course_name')->unique();
            $table->string('duration');
            $table->string('grade');
            $table->text('description');
            $table->string('reason');
            $table->boolean('verifying')->default(false);
            $table->integer('researcher_id')->unsigned();
            $table->integer('verifier_id')->unsigned()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('pending_courses');
    }
}
