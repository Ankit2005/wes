<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->mediumText("emp_img");
            $table->string("emp_name",50);
            $table->string("job_role",50);
            $table->float("job_role_salary",8,2);

            $table->string("designation", 50);
            $table->string("department", 50);

            // img file
            $table->mediumText("residential_proof");
            $table->mediumText("qualification_proof");
            $table->mediumText("certification_proof");

            $table->bigInteger("contact");
            $table->string("email", 50);
            $table->string("region", 50);

            $table->mediumText("street_address");
            $table->string("city", 30);
            $table->integer("pincode");
            $table->string("state", 50);
            $table->string("country", 50);
            $table->string("emp_gender", 10);

            $table->date("emp_birth_date");
            $table->date("emp_hire_date");

            // emp last job details field
            $table->string("prev_company_name", 50)->nullable();
            $table->string("emp_experience", 15)->nullable();
            $table->float("prev_salary", 8, 2)->nullable();
            $table->mediumText("prev_salary_sleep")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
