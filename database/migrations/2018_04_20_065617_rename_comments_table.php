<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropForeign('comments_course_id_foreign');
            $table->dropForeign('comments_student_id_foreign');
            $table->dropColumn('course_id');
            $table->dropColumn('student_id');
            $table->string('course_name');
            $table->integer('user_id')->unsigned();

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
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropForeign('comments_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('course_name');
            $table->integer('course_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }
}
