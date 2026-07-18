<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id')->get();
        return view('admin.departments.index', [
            'title'       => 'Departments',
            'departments' => $departments,
        ]);
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', [
            'title'      => 'Edit Department: ' . $department->name,
            'department' => $department,
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'introduction'       => 'nullable|string',
            'training_programs'  => 'nullable|string',
            'research_activities'=> 'nullable|string',
            'contact_info'       => 'nullable|string',
        ]);

        $department->update($request->only([
            'introduction', 'training_programs', 'research_activities', 'contact_info',
        ]));

        return redirect('/admin/departments')->with('success', 'Department updated successfully.');
    }
}
