<?php

namespace App\Http\Controllers;

use App\Models\FacultyInfo;

class ContactController extends Controller
{
    public function index()
    {
        $keys = [
            'contact_address',
            'contact_email',
            'contact_phone',
            'contact_office_location',
            'contact_it_department_email',
            'contact_it_department_phone',
        ];

        $contact = FacultyInfo::whereIn('key', $keys)->pluck('value', 'key');

        return view('faculty.contact', compact('contact'));
    }
}
