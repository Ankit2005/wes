<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobrole extends Model
{
    protected $fillable = [
        "job_role",
        "salary",
        "team_name"
    ];
}
