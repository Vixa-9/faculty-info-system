<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyInfo extends Model
{
    protected $table = 'faculty_info';

    protected $fillable = ['key', 'value'];
}
