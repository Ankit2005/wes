<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobroles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('job_role', 30)->unique();
            $table->string('qualification', 50);
            $table->string('certification', 50);
            $table->string('experience', 50);
            $table->float('salary', 8,2);
            $table->string('team_name', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobroles');
    }
}
