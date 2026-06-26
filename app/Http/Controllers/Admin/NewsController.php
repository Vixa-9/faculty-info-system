<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\News\NewsService;
use App\Models\News;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this -> newsService = $newsService;
    }

    public function index()
    {
        return view ('admin.news.list',[
           'title' => 'Danh sách bài viết',
           'news' => $this ->newsService->get()
        ]);
    }

    public function create()
    {
        return view('admin.news.add',[
            'title' => 'Thêm Bài viết mới',
            'menus' => $this->newsService->getMenu()
        ]);
    }


    public function store(NewsFormRequest $request)
    {
        $this -> newsService ->insert($request);
        return redirect()->back();
    }

    public function show(News $new)
    {
        return view('admin.news.edit',[
            'title' =>"Chỉnh Sửa Bài Viết",
            'new' => $new,
            'menus' => $this->newsService->getMenu()
    ]);

    }

    public function update(Request $request, News $new)
    {
        $result = $this->newsService->update($request, $new);
        if ($result) {
            return redirect('/admin/news/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->newsService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function searchResult(Request $request)
  {
        $keyword = $request->input('keyword');
        $nResult = null;
       
        if($keyword != null){
            $nResult = News::newsSearch($keyword, 3);
          
        }

        return view ('admin.news.search',[
          'title' => 'Tìm kiếm Bài Viết'
       ])->with(compact('nResult'));
    }
}
