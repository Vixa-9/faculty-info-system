<?php


namespace App\Http\Services\Menu;


use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Boolean;


class MenuService
{

    public function getParent($parent_id =1)
    {
        return Menu::where('parent_id',0)->get();
    }



    public static function getAll()
    {

       /* return Menu::orderbyDesc('name')->paginate(20);*/

       return Menu::select('stt','id', 'name', 'link', 'active','updated_at')
        ->orderBy('id','asc')
        ->paginate(20);

    }
 public function  create($request)
 {
     try
     {
        Menu::create([
            'name' => (string)$request->input('name'),
            'parent_id' => (int)$request->input('parent_id'),
             'active' => (string)$request->input('active'),
              'link' => (string)$request->input('link')

        ]);
        Session::flash('success','Tạo Menu thành công');
     }catch (\Exception $err){
         Session::flash('error',$err->getMessage());
         return false;

     }
     return  true;
 }

 public function destroy($request)
 {
     $id = (int) $request->input('id');
     $menu = Menu::where('id',$request->input('id'))->first();
     if($menu){
        return Menu::where('id',$id)->orwhere('parent_id', $id)->delete();
     }
        return false;
 }

 public function update($request, $menu)
 {
    if($request->input('parent_id') != $menu->id){
        $menu->parent_id = (int)$request->input('parent_id');
    }

     try {
         $menu->fill($request->input());
         $menu->save();
         Session::flash('success', 'Cập nhật thành công');
     } catch (\Exception $err) {
         Session::flash('error', 'Có lỗi vui lòng thử lại');
         \Log::info($err->getMessage());
         return false;
     }
     return true;
 }
}

