<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('name');
            $table->bigInteger('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_super')->default(false);
        
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')
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
        Schema::dropIfExists('staff');
    }
}
