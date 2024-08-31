<?php
// In the migration file (e.g., database/migrations/_create_employee_ratings_table.php)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_ratings', function (Blueprint $table) {
            $table->id();// Creates an auto-incrementing primary key column
            $table->integer('rating_value');

            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_ratings');
    }
}

