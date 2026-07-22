<?php

namespace App\Http\Controllers;

use App\Models\StudentProject;
use App\Models\Lecturer;

class StudentProjectPublicController extends Controller
{
    public function index()
    {
        $departments = Lecturer::$departments;
        $years = StudentProject::whereNotNull('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $query = StudentProject::orderBy('year', 'desc')->orderBy('title');

        if (request('department') && in_array(request('department'), $departments)) {
            $query->where('department', request('department'));
        }

        if (request('year') && ctype_digit(request('year'))) {
            $query->where('year', request('year'));
        }

        return view('faculty.student-projects', [
            'title'       => 'Student Projects',
            'projects'    => $query->paginate(9),
            'departments' => $departments,
            'years'       => $years,
        ]);
    }
}
