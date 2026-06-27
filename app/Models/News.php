<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'summary',
        'content',
        'image',
        'published_at',
        'active',
    ];

    protected $dates = ['published_at'];

    public static function newsSearch($keyword, $paginate)
    {
        return News::where('title', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
