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

    public function index()
    {
        $data = FacultyInfo::whereIn('key', array_keys(self::FIELDS))
            ->pluck('value', 'key');

        return view('admin.faculty_info.index', [
            'title'  => 'Faculty Information',
            'fields' => self::FIELDS,
            'data'   => $data,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fields'   => 'required|array',
            'fields.*' => 'nullable|string',
        ]);

        foreach ($request->input('fields') as $key => $value) {
            if (!array_key_exists($key, self::FIELDS)) {
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
