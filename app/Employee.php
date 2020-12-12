<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        "emp_img",
        "emp_name",
        "job_role",
        "job_role_salary",
        "designation",
        "department",
        "residential_proof",
        "qualification_proof",
        "certification_proof",
        "contact",
        "email",
        "region",
        "street_address",
        "city",
        "pincode",
        "state",
        "country",
        "emp_gender",
        "emp_birth_date",
        "emp_hire_date",
        "prev_company_name",
        "emp_experience",
        "prev_salary",
        "prev_salary_sleep"
    ];
}
