<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchActivity extends Model
{
    protected $fillable = [
        'title', 'type', 'description', 'authors',
        'date', 'link', 'image', 'department',
    ];

    public static $types = [
        'Research Project',
        'Publication',
        'Conference',
        'Workshop',
        'Award',
    ];
}
