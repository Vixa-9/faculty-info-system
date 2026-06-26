<?php

namespace App\Http\Controllers;

use App\Http\Services\Config\ConfigService;
use App\Http\Services\Slide\SlideService;
use App\Models\Config;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainControllers extends Controller
{
    protected $slide;


    public function __construct(SlideService $slide)
    {
        $this->slide = $slide;


    }

    public function index()
    {
        return view('main', [
            'title' => 'Khoa Kỹ thuật Công nghệ',
            'slides' => $this->slide->show(),
        ]);
    }

    public function show()
    {
        return Slide::orderByDesc('id')->get();
    }


}
