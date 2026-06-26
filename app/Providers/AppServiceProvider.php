<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Menu;
use App\Models\Slide;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menuItems = Menu::where('active','1');
        view()->share('menuItems',$menuItems);

        $slides = Slide::get('id');
        view()->share('slides',$slides);

        $arts = Article::get('id');
        view()->share('arts',$arts);
    }
}
