<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsPublicController extends Controller
{
    public function index()
    {
        $news = News::where('active', true)
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('news.index', [
            'title' => 'News',
            'news'  => $news,
        ]);
    }

    public function show(News $news)
    {
        abort_if(!$news->active, 404);

        return view('news.show', [
            'title' => $news->title,
            'news'  => $news,
        ]);
    }
}
