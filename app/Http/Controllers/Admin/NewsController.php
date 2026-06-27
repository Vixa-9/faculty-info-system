<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Services\News\NewsService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        return view('admin.news.index', [
            'title' => 'News List',
            'news'  => $this->newsService->get(),
        ]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'title' => 'Add News',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'summary' => 'required',
            'content' => 'required',
            'image'   => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['title', 'summary', 'content', 'published_at', 'active']);
        $input['active'] = $request->has('active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/posts/' . date('Y/m/d'));
            $file->move($path, $nameFile);
            $input['image'] = '/images/posts/' . date('Y/m/d') . '/' . $nameFile;
        }

        News::create($input);
        Session::flash('success', 'News added successfully');
        return redirect('/admin/news');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'title' => 'Edit News: ' . $news->title,
            'news'  => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'   => 'required',
            'summary' => 'required',
            'content' => 'required',
            'image'   => 'nullable|mimes:jpeg,bmp,png|max:2048',
        ]);

        $input = $request->only(['title', 'summary', 'content', 'published_at']);
        $input['active'] = $request->has('active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nameFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/posts/' . date('Y/m/d'));
            $file->move($path, $nameFile);
            $input['image'] = '/images/posts/' . date('Y/m/d') . '/' . $nameFile;
        }

        $news->update($input);
        Session::flash('success', 'News updated successfully');
        return redirect('/admin/news');
    }

    public function destroy(Request $request)
    {
        $result = $this->newsService->delete($request);
        if ($result) {
            return response()->json(['error' => false, 'message' => 'News deleted successfully']);
        }
        return response()->json(['error' => true]);
    }
}
