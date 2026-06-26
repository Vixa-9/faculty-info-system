<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Slide\SlideService;

class SlideController extends Controller
{
    protected $slide;

    public function __construct(SlideService $slide)
    {
        $this->slide = $slide;
    }

    public function index()
    {
        return view('admin.slide.list', [
            'title' => 'Danh Sách Slide Mới',
            'slides' => $this->slide->get()
        ]);
    }


    public function create()
    {
        return view('admin.slide.add', [
            'title' => 'Thêm Slide mới'
        ]);
    }


    public function store(Request $request)
    {
        if ($request->file('image'))
        {

            $request->validate([
                'name' => 'required',
                'image' => 'required:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $slide = $request->all();

            if ($request->hasFile('image'))
            {
                try {
                    $nameFile = $request->file('image')->getClientOriginalName();
                    $pathFull = '/images/slide/'. date("Y/m/d");

                    $request->file('image')->move(public_path('images/slide/'). date("Y/m/d"), $nameFile);

                    $slide['image'] = $pathFull. '/' . $nameFile;
                    Slide::create($slide);
                    Session::flash('success', 'Thêm Slide mới thành công');
                    return redirect()->back();

                } catch (\Exception $error) {
                    Session::flash('error', 'Thêm Slide mới không thành công');
                    return redirect()->back();
                }
            }
        }
    }

    public function show(Slide $slide)
    {
        return view('admin.slide.edit', [
            'title' => 'Chỉnh Sửa Slide:'.$slide->name,
            'slide' => $slide
        ]);
    }


    public function update(Request $request, Slide $slide)
    {
        $input = $request->all();
        if ($request->hasFile('image'))
        {
                $nameFile = $request->file('image')->getClientOriginalName();
                $pathFull = '/images/slide/'. date("Y/m/d");

                $request->file('image')->move(public_path('images/slide/'). date("Y/m/d"), $nameFile);
                $input['image'] = $pathFull. '/' . $nameFile;
        }else{
            unset($input['image']);

        }
        $slide->update($input);
        Session::flash('success', 'Thêm Slide mới thành công');
        return redirect('/admin/slides/list');

    }

    public function destroy(Request $request)
    {
        $result = $this->slide->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Slide'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function searchResult(Request $request)
    {
        $keyword = $request->input('keyword');
        $sResult = null;

        if($keyword != null){
            $sResult = Slide::slideSearch($keyword, 3);

        }

        return view ('admin.slide.search',[
            'title' => 'Kết quả tìm kiếm Slide'
        ])->with(compact('sResult'));
    }
}
