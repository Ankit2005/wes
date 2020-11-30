<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        "team_role",
        "team_name",
        "about_team",
        "team_creator_role"
    ];


}
