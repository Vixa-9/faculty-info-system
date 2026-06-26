<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'user',
        'hot',
        'photo'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }

    protected $table = 'news';
    public static function newsSearch($keyword, $paginate){
        return News::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
