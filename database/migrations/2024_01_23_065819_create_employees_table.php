<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->string('gender');
            $table->string('profilepic')->nullable();
            $table->integer('kebeleid');
            $table->timestamps();

            // Foreign key relationships
            $table->foreignId('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
