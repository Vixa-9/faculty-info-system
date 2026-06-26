<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'image',
        'url',
    ];

    protected $table = 'slides';
    public static function slideSearch($keyword, $paginate){
        return Slide::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
