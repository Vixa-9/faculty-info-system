<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'slug', 'introduction',
        'training_programs', 'research_activities', 'contact_info',
    ];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class, 'department', 'name');
    }
}
