<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicYearStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_staff', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->string('role');

        $table->foreign('staff_id')->references('id')->on('staff')
        ->onDelete('cascade');

        $table->foreign('academic_year_id')->references('id')->on('academic_years')
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
        Schema::dropIfExists('academic_year_staff');
    }
}
