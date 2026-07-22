<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StudentProjectController extends Controller
{
    public function index()
    {
        return view('admin.student-projects.index', [
            'title'    => 'Student Projects',
            'projects' => StudentProject::orderBy('year', 'desc')->orderBy('title')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.student-projects.create', [
            'title'       => 'Add Student Project',
            'departments' => Lecturer::$departments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only([
            'title', 'description', 'team_members', 'supervisor',
            'department', 'year', 'award',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/student-projects/' . date('Y')), $filename);
            $input['image'] = '/images/student-projects/' . date('Y') . '/' . $filename;
        }

        StudentProject::create($input);
        Session::flash('success', 'Student project added successfully.');
        return redirect('/admin/student-projects');
    }

    public function edit(StudentProject $studentProject)
    {
        return view('admin.student-projects.edit', [
            'title'       => 'Edit: ' . $studentProject->title,
            'project'     => $studentProject,
            'departments' => Lecturer::$departments,
        ]);
    }

    public function update(Request $request, StudentProject $studentProject)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only([
            'title', 'description', 'team_members', 'supervisor',
            'department', 'year', 'award',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/student-projects/' . date('Y')), $filename);
            $input['image'] = '/images/student-projects/' . date('Y') . '/' . $filename;
        }

        $studentProject->update($input);
        Session::flash('success', 'Student project updated successfully.');
        return redirect('/admin/student-projects');
    }

    public function destroy(Request $request)
    {
        $project = StudentProject::find($request->input('id'));
        if ($project) {
            $project->delete();
            return response()->json(['error' => false, 'message' => 'Deleted.']);
        }
        return response()->json(['error' => true]);
    }
}
