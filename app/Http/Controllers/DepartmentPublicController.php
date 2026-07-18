<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentPublicController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id')->get();
        return view('faculty.departments.index', [
            'title'       => 'Departments',
            'departments' => $departments,
        ]);
    }

    public function show(Department $department)
    {
        $lecturers = $department->lecturers()->orderBy('name')->get();
        return view('faculty.departments.show', [
            'title'      => $department->name,
            'department' => $department,
            'lecturers'  => $lecturers,
        ]);
    }
}
