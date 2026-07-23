<?php

namespace App\Http\Controllers;

use App\Http\Services\Slide\SlideService;
use App\Models\Department;
use App\Models\FacultyInfo;
use App\Models\News;
use App\Models\ResearchActivity;
use App\Models\Slide;
use App\Models\StudentProject;
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
            'title'             => 'Khoa Kỹ thuật Công nghệ',
            'slides'            => $this->slide->show(),
            'featured'          => News::where('active', true)->orderByDesc('published_at')->take(5)->get(),
            'latestNews'        => News::where('active', true)->orderByDesc('published_at')->take(4)->get(),
            'facultyIntro'      => FacultyInfo::where('key', 'introduction')->value('value'),
            'departments'       => Department::orderBy('id')->get(),
            'featuredResearch'  => ResearchActivity::orderBy('date', 'desc')->take(3)->get(),
            'featuredProjects'  => StudentProject::orderBy('year', 'desc')->orderBy('id', 'desc')->take(3)->get(),
        ]);
    }

    public function show()
    {
        return Slide::orderByDesc('id')->get();
    }
}
