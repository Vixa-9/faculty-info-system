<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Services\Article\ArticleService;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    protected $artService;

    public function __construct(ArticleService $artService)
    {
        $this->artService = $artService;
    }

    public function index()
    {
        return view('admin.article.list', [
            'title' => 'Danh Sách Bài viết',
            'arts' => $this->artService->get()
        ]);
    }

    public function create()
    {
        return view('admin.article.add', [
            'title' => 'Thêm Bài Viết Mới',
            'menus' => $this->artService->getMenu()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);

        $input = $request->all();

        if ($request->hasFile('image'))
        {
            try {
                $nameFile = $request->file('image')->getClientOriginalName();
                $pathFull = '/images/posts/'. date("Y/m/d");

                $request->file('image')->move(public_path('images/posts/'). date("Y/m/d"), $nameFile);

                $input['image'] = $pathFull. '/' . $nameFile;
                Article::create($input);
                Session::flash('success', 'Thêm Bài viết mới thành công');
                return redirect()->back();

            } catch (\Exception $error) {
                Session::flash('error', 'Thêm Bài viết mới không thành công');
                return redirect()->back();
            }
        }
    }


    public function show(Article $art)
    {
        return view('admin.article.edit', [
            'title' => 'Chỉnh Sửa Bài Viết: '.$art->name,
            'art' => $art,
            'menus' => $this->artService->getMenu()
        ]);
    }


    public function update(Request $request, Article $art)
    {
        $input = $request->all();
        if ($request->hasFile('image'))
        {
            $nameFile = $request->file('image')->getClientOriginalName();
            $pathFull = '/images/posts/'. date("Y/m/d");

            $request->file('image')->move(public_path('images/posts/'). date("Y/m/d"), $nameFile);
            $input['image'] = $pathFull. '/' . $nameFile;
        }else{
            unset($input['image']);

        }
        $art->update($input);
        Session::flash('success', 'Cập nhật thành công');
        return redirect('/admin/arts/list');
    }


    public function destroy(Request $request)
    {
        $result = $this->artService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function searchResult(Request $request)
    {
        $keyword = $request->input('keyword');
        $aResult = null;

        if($keyword != null){
            $aResult = Article::artSearch($keyword, 3);

        }

        return view ('admin.article.search',[
            'title' => 'Kết quả tìm kiếm Menu'
        ])->with(compact('aResult'));
    }
}
