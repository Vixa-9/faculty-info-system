<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active',
        'link'
    ];

    public  function submenus(){
        return $this -> hasMany(Menu::class, 'parent_id')->where ('active','1');
    }

   protected $table = 'menus';
    public static function menuSearch($keyword, $paginate){
        return Menu::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
