<?php

// In the migration file (e.g., create_employee_favorites_table.php)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('employees_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('favorite_add_by')->references('id')->on('employers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_favorites');
    }
}
