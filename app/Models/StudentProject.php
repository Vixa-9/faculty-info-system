<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    protected $fillable = [
        'title', 'description', 'team_members', 'supervisor',
        'department', 'year', 'award', 'image',
    ];
}
