<?php


namespace App\Http\Services\News;


use App\Models\Menu;
use App\Models\News;
use Illuminate\Support\Facades\Session;

class NewsService
{
    public function  getMenu()
    {
        return Menu::where('active',1)->get();
    }

    public function  get()
    {
        return News::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function insert($request)
    {

        try{
            $request->except('_token');
            News::create($request->all());

            Session::flash('success','Thêm bài viết thành công');
        }catch (\Exception $err){
            Session::flash('error','Thêm bài viết lỗi');
            \Log::info($err->getMessage());
            return  false;
        }
        return true;
    }

    public function update($request, $new)
    {
        try {
            $new->fill($request->input());
            $new->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $news = News::where('id', $request->input('id'))->first();
        if ($news) {
            $news->delete();
            return true;
        }

        return false;
    }
}
