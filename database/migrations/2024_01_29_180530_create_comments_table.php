<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('commented_date');
            $table->timestamps();
		    $table->foreignId('commented_by_id')->references('id')->on('employers');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('employer_id')->references('id')->on('employers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
