<?php

namespace App\Http\Controllers;

use App\Models\ResearchActivity;

class ResearchPublicController extends Controller
{
    public function index()
    {
        $types = ResearchActivity::$types;
        $query = ResearchActivity::orderBy('date', 'desc');

        if (request('type') && in_array(request('type'), $types)) {
            $query->where('type', request('type'));
        }

        return view('faculty.research', [
            'title'      => 'Research Activities',
            'activities' => $query->paginate(10),
            'types'      => $types,
        ]);
    }
}
