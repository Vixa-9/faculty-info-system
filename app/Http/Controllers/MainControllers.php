<?php

namespace App\Http\Controllers;

use App\Http\Services\Slide\SlideService;
use App\Models\News;
use App\Models\Slide;
use Illuminate\Http\Request;

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
            'title'    => 'Khoa Kỹ thuật Công nghệ',
            'slides'   => $this->slide->show(),
            'featured' => News::where('active', true)->orderByDesc('published_at')->take(5)->get(),
            'latestNews' => News::where('active', true)->orderByDesc('published_at')->take(8)->get(),
        ]);
    }

    public function show()
    {
        return Slide::orderByDesc('id')->get();
    }


}
