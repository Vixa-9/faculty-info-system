<?php


namespace App\Http\View\Composers;

use App\Models\Config;
use App\Models\Menu;
use Illuminate\View\View;
use App\Models\Slide;
class MenuComposer
{

    protected $users;


    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);

        $company= Config::select('description')->where('name','company')->first();
        $view->with('company',$company);

        $logo = Config::select('description')->where('name','logo')->first();
        $view->with('logo',$logo);

        $phone = Config::select('description')->where('name','phone')->first();
        $view->with('phone',$phone);

        $email= Config::select('description')->where('name','email')->first();
        $view->with('email',$email);

        $address1= Config::select('description')->where('name','address1')->first();
        $view->with('address1',$address1);

        $address2= Config::select('description')->where('name','address2')->first();
        $view->with('address2',$address2);

        $favicon = Config::select('description')->where('name','favicon')->first();
        $view->with('favicon',$favicon);

        $slides = Slide::select('id', 'name', 'content', 'url')->orderByDesc('id')->get();
        $view->with('slides', $slides);

    }
}
