<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;

class LecturerPublicController extends Controller
{
    public function index()
    {
        $byDepartment = Lecturer::orderBy('name')
            ->get()
            ->groupBy('department');

        return view('faculty.lecturers', [
            'title'        => 'Our Lecturers',
            'byDepartment' => $byDepartment,
        ]);
    }
}
