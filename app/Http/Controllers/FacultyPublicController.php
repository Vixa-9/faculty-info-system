<?php

namespace App\Http\Controllers;

use App\Models\FacultyInfo;

class FacultyPublicController extends Controller
{
    public function about()
    {
        $info = FacultyInfo::pluck('value', 'key');

        return view('faculty.about', [
            'title' => 'About the Faculty',
            'info'  => $info,
        ]);
    }
}
