<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'user',
        'hot',
        'image'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }

    protected $table = 'article';
    public static function artSearch($keyword, $paginate){
        return Article::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
