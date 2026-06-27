<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadFileController;
use App\Http\Controllers\MainControllers;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\NewsPublicController;



Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function ()
    {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Config
        Route::prefix('configs')->group(function () {
            Route::get('add', [ConfigController::class, 'create']);
            Route::post('add', [ConfigController::class, 'update']);

        });

        #Menu
        Route::prefix('menus')->group(function ()
        {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('search', [MenuController::class, 'searchResult']);
        });

        #Article
        Route::prefix('arts')->group(function ()
        {
            Route::get('add', [ArticleController::class, 'create']);
            Route::post('add', [ArticleController::class, 'store']);
            Route::get('list', [ArticleController::class, 'index']);
            Route::get('edit/{art}', [ArticleController::class, 'show']);
            Route::post('edit/{art}', [ArticleController::class, 'update']);
            Route::DELETE('destroy', [ArticleController::class, 'destroy']);
            Route::get('search', [ArticleController::class, 'searchResult']);
        });

        #Slide
        Route::prefix('slides')->group(function()
        {
            Route::get('add',[SlideController::class,'create']);
            Route::post('add', [SlideController::class, 'store']);
            Route::get('list', [SlideController::class, 'index']);
            Route::get('edit/{slide}',[SlideController::class,'show']);
            Route::post('edit/{slide}', [SlideController::class, 'update']);
            Route::DELETE('destroy', [SlideController::class, 'destroy']);
            Route::get('search', [SlideController::class, 'searchResult']);

        });

        #News
        Route::prefix('news')->group(function () {
            Route::get('/',             [NewsController::class, 'index']);
            Route::get('/create',       [NewsController::class, 'create']);
            Route::post('/',            [NewsController::class, 'store']);
            Route::get('/{news}/edit',  [NewsController::class, 'edit']);
            Route::put('/{news}',       [NewsController::class, 'update']);
            Route::DELETE('/destroy',   [NewsController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        #Files
        Route::prefix('files')->group(function()
        {
            Route::get('add',[UploadFileController::class,'create']);
            Route::post('add', [UploadFileController::class, 'store']);
            Route::get('lis', [UploadFileController::class, 'index']);
            Route::get('edit/{file}',[UploadFileController::class,'show']);
            Route::post('edit/{file}', [UploadFileController::class, 'update']);
            Route::DELETE('destroy', [UploadFileController::class, 'destroy']);
        });



    });

});
Route::get('/', [MainControllers::class, 'index']);
Route::get('/dccthp', [TrainingController::class, 'train']);
Route::get('/ctdt', [EduController::class, 'edu']);
Route::get('/ctdt22', [EduController::class, 'edu22']);
Route::get('/news', [NewsPublicController::class, 'index']);
Route::get('/news/{news}', [NewsPublicController::class, 'show']);





