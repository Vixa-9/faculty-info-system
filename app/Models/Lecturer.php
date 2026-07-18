<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'name', 'title', 'position', 'department',
        'email', 'phone', 'bio', 'photo', 'research_interests',
    ];

    public static $departments = [
        'Information Technology',
        'Civil Engineering',
        'Electrical and Electronics Engineering',
        'Mechanical Engineering',
        'Faculty Office',
    ];
}
