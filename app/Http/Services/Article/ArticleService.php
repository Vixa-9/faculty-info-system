<?php


namespace App\Http\Services\Article;
use App\Models\Article;
use App\Models\Menu;


class ArticleService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function get()
    {
        return Article::with('menu')
            ->orderByDesc('id')->paginate(5);
    }

    public function destroy($request)
    {
        $art = Article::find($request->id);
        if ($art) {
            return $art->delete();
        }
        return false;
    }
}
