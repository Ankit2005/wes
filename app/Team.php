<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        "team_creator_role",
        "team_role",
        "team_name",
        "about_team"
    ];


}
