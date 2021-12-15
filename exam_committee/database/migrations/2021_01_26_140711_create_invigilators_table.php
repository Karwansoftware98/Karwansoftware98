<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvigilatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {
        Schema::create('invigilators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->date('date_of_guarding');
            $table->String('type');
 
            $table->foreign('staff_id')->references('id')->on('staff')
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
        Schema::dropIfExists('invigilators');
    }
}
