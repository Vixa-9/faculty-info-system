<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = ['page_url', 'page_title', 'ip_hash', 'visited_at'];

    protected $dates = ['visited_at'];
}
