<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacultyInfo;
use Illuminate\Http\Request;

class FacultyInfoController extends Controller
{
    private const FIELDS = [
        'introduction'   => 'Introduction',
        'vision'         => 'Vision',
        'mission'        => 'Mission',
        'history'        => 'History',
        'org_structure'  => 'Organizational Structure',
        'office_info'    => 'Office Information',
    ];

    private const CONTACT_FIELDS = [
        'contact_address'             => 'Address',
        'contact_email'               => 'Faculty Email',
        'contact_phone'               => 'Faculty Phone',
        'contact_office_location'     => 'Office Location',
        'contact_it_department_email' => 'IT Department Email',
        'contact_it_department_phone' => 'IT Department Phone',
    ];

    private function allAllowedKeys(): array
    {
        return array_merge(array_keys(self::FIELDS), array_keys(self::CONTACT_FIELDS));
    }

    public function index()
    {
        $allKeys = $this->allAllowedKeys();
        $data = FacultyInfo::whereIn('key', $allKeys)->pluck('value', 'key');

        return view('admin.faculty_info.index', [
            'title'         => 'Faculty Information',
            'fields'        => self::FIELDS,
            'contactFields' => self::CONTACT_FIELDS,
            'data'          => $data,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fields'   => 'nullable|array',
            'fields.*' => 'nullable|string',
        ]);

        $allowed = $this->allAllowedKeys();

        foreach ($request->input('fields', []) as $key => $value) {
            if (!in_array($key, $allowed)) {
                continue;
            }
            FacultyInfo::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }

        return redirect('/admin/faculty-info')->with('success', 'Faculty information updated successfully.');
    }
}
