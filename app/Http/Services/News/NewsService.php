<?php

namespace App\Http\Services\News;

use App\Models\News;

class NewsService
{
    public function get()
    {
        return News::orderByDesc('id')->paginate(15);
    }

    public function getActive()
    {
        return News::where('active', true)
            ->orderByDesc('published_at')
            ->paginate(10);
    }

    public function delete($request)
    {
        $news = News::find($request->input('id'));
        if ($news) {
            $news->delete();
            return true;
        }
        return false;
    }
}
