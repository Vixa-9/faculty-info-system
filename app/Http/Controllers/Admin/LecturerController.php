<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LecturerController extends Controller
{
    public function index()
    {
        return view('admin.lecturers.index', [
            'title'     => 'Lecturers',
            'lecturers' => Lecturer::orderBy('department')->orderBy('name')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.lecturers.create', [
            'title'       => 'Add Lecturer',
            'departments' => Lecturer::$departments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'department' => 'required',
            'photo'      => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['name', 'title', 'position', 'department', 'email', 'phone', 'bio', 'research_interests']);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/lecturers/' . date('Y')), $filename);
            $input['photo'] = '/images/lecturers/' . date('Y') . '/' . $filename;
        }

        Lecturer::create($input);
        Session::flash('success', 'Lecturer added successfully.');
        return redirect('/admin/lecturers');
    }

    public function edit(Lecturer $lecturer)
    {
        return view('admin.lecturers.edit', [
            'title'       => 'Edit Lecturer: ' . $lecturer->name,
            'lecturer'    => $lecturer,
            'departments' => Lecturer::$departments,
        ]);
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name'       => 'required',
            'department' => 'required',
            'photo'      => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['name', 'title', 'position', 'department', 'email', 'phone', 'bio', 'research_interests']);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/lecturers/' . date('Y')), $filename);
            $input['photo'] = '/images/lecturers/' . date('Y') . '/' . $filename;
        }

        $lecturer->update($input);
        Session::flash('success', 'Lecturer updated successfully.');
        return redirect('/admin/lecturers');
    }

    public function destroy(Request $request)
    {
        $lecturer = Lecturer::find($request->input('id'));
        if ($lecturer) {
            $lecturer->delete();
            return response()->json(['error' => false, 'message' => 'Lecturer deleted.']);
        }
        return response()->json(['error' => true]);
    }
}
