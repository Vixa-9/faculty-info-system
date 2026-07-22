<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchActivity;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResearchActivityController extends Controller
{
    public function index()
    {
        return view('admin.research.index', [
            'title'      => 'Research Activities',
            'activities' => ResearchActivity::orderBy('date', 'desc')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.research.create', [
            'title'       => 'Add Research Activity',
            'types'       => ResearchActivity::$types,
            'departments' => Lecturer::$departments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'type'   => 'required|in:' . implode(',', ResearchActivity::$types),
            'image'  => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['title', 'type', 'description', 'authors', 'date', 'link', 'department']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/research/' . date('Y')), $filename);
            $input['image'] = '/images/research/' . date('Y') . '/' . $filename;
        }

        ResearchActivity::create($input);
        Session::flash('success', 'Research activity added successfully.');
        return redirect('/admin/research');
    }

    public function edit(ResearchActivity $research)
    {
        return view('admin.research.edit', [
            'title'       => 'Edit: ' . $research->title,
            'activity'    => $research,
            'types'       => ResearchActivity::$types,
            'departments' => Lecturer::$departments,
        ]);
    }

    public function update(Request $request, ResearchActivity $research)
    {
        $request->validate([
            'title'  => 'required',
            'type'   => 'required|in:' . implode(',', ResearchActivity::$types),
            'image'  => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['title', 'type', 'description', 'authors', 'date', 'link', 'department']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/research/' . date('Y')), $filename);
            $input['image'] = '/images/research/' . date('Y') . '/' . $filename;
        }

        $research->update($input);
        Session::flash('success', 'Research activity updated successfully.');
        return redirect('/admin/research');
    }

    public function destroy(Request $request)
    {
        $activity = ResearchActivity::find($request->input('id'));
        if ($activity) {
            $activity->delete();
            return response()->json(['error' => false, 'message' => 'Deleted.']);
        }
        return response()->json(['error' => true]);
    }
}
