<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'photo',
        'sort_by',
        'active',
        'user'
    ];

    protected $table = 'sliders';
    public static function sliderSearch($keyword, $paginate){
        return Slider::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
