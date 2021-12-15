<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrollementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('stage_id');
            $table->timestamps();


            $table->foreign('student_id')->references('id')->on('students')
            ->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
            ->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enrollements');
    }
}
