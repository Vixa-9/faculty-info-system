<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Config\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Kernel;


class ConfigController extends Controller
{

    public function create()
    {
        $logo = DB::table('configs')->where('status', '1')->where('name', 'logo')->first();
        $company = DB::table('configs')->where('status', '1')->where('name', 'company')->first();
        $email = DB::table('configs')->where('status', '1')->where('name', 'email')->first();
        $phone = DB::table('configs')->where('status', '1')->where('name', 'phone')->first();
        $address1 = DB::table('configs')->where('status', '1')->where('name', 'address1')->first();
        $address2 = DB::table('configs')->where('status', '1')->where('name', 'address2')->first();
        $favicon= DB::table('configs')->where('status', '1')->where('name', 'favicon')->first();
       

        return view('admin.config.add', [
            'title' => 'Cấu hình hệ thống',
            'logo' => $logo,
            'company' => $company,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'favicon' => $favicon,
            
        ]);
    }

   public function update(Request $request)
   {
         if($request-> company == ''||$request-> email ==''||$request->phone ==''){
             return redirect('admin/configs/add')
                 ->with('error','Vui lòng điển vào các trường có dấu *');
         }

          Config::where('status', 1)->where('name', 'company')->update(['description' => $request->company]);
          Config::where('status', 1)->where('name', 'email')->update(['description' => $request->email]);
          Config::where('status', 1)->where('name', 'phone')->update(['description' => $request->phone]);
          Config::where('status', 1)->where('name', 'address1')->update(['description' => $request->address1]);
          Config::where('status', 1)->where('name', 'address2')->update(['description' => $request->address2]);

          if(!empty($request->file('logo'))) 
          {
              $logo = Config::where('status', 1)->where('name', 'logo')->first();
              $path = 'images/logo/' . $logo->description;
              if (File::exists($path)) {
                  File::delete($path);
              }
              $name = $request->file('logo')->getClientOriginalName();
              $request->file('logo')->move('images/logo/', $name);

              $logo->description = $name;
              $logo->save();
          }

          if (!empty($request->file('favicon'))) {
              $favicon = Config::where('status', 1)->where('name', 'favicon')->first();
              $path = 'images/favicon/' . $favicon->description;
              if (File::exists($path)) {
                  File::delete($path);
              }
              $name = $request->file('favicon')->getClientOriginalName();
              $request->file('favicon')->move('images/favicon/', $name);

              $favicon->description = $name;
              $favicon->save();
           }

          return redirect('admin/configs/add')
              ->with('success','Cập Nhật Thành Công');
      }
}




