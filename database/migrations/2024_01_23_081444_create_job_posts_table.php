// database/migrations/{timestamp}_create_job_posts_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('type');
            $table->decimal('salary_wage', 10, 2); // Adjust the precision and scale based on your requirements
            $table->text('responsiblity');
            $table->text('requirement');
            $table->text('description');
            $table->timestamps();

            // Foreign key relationship
            $table->foreignId('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
       });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
