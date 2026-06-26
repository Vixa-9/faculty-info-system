<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this -> menuService = $menuService;
    }

    public function create()
   {
       return view('admin.menu.add',[
           'title' => 'Thêm Menu mới',
           'menus' => $this->menuService->getParent()
       ]);
   }

   public function store(CreateFormRequest $request)
   {
       $result = $this->menuService->create($request);

       return redirect()->back();
   }

   public function index()
   {
       return view('admin.menu.list',[
           'title' => 'Danh sách Menu mới nhất',
           'menus' => $this -> menuService ->getAll()
       ]);
   }

   public function destroy(Request $request): JsonResponse
   {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá Menu thành công'
            ]);
        }
        return  response()->json([
           'error' => true
        ]);
   }

   public function show(Menu $menu)
   {


       return view ('admin.menu.edit',[
          'title' => 'Chỉnh sửa Menu:' .$menu -> name,
           'menu' => $menu,
           'menus' => $this->menuService->getParent()
       ]);
   }

   public function update(Menu $menu, Request $request)
   {
       $result = $this->menuService->update($request, $menu);
       if ($result) {
           return redirect('/admin/menus/list');
       }

       return redirect()->back();
   }


  public function searchResult(Request $request)
  {
        $keyword = $request->input('keyword');
        $mResult = null;

        if($keyword != null){
            $mResult = Menu::menuSearch($keyword, 3);

        }

        return view ('admin.menu.search',[
          'title' => 'Kết quả tìm kiếm Menu'
       ])->with(compact('mResult'));
    }
}
