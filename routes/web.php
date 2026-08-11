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
use App\Http\Controllers\Admin\AdminAnalyticsController;
use App\Http\Controllers\Admin\FacultyInfoController;
use App\Http\Controllers\FacultyPublicController;
use App\Http\Controllers\LecturerPublicController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\DepartmentPublicController;
use App\Http\Controllers\Admin\ResearchActivityController;
use App\Http\Controllers\ResearchPublicController;
use App\Http\Controllers\Admin\StudentProjectController;
use App\Http\Controllers\StudentProjectPublicController;
use App\Http\Controllers\ContactController;



Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);
Route::post('admin/logout', [LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function ()
    {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        Route::get('analytics', [AdminAnalyticsController::class, 'index']);
        Route::get('faculty-info',  [FacultyInfoController::class, 'index']);
        Route::post('faculty-info', [FacultyInfoController::class, 'update']);

        Route::prefix('research')->group(function () {
            Route::get('/',                  [ResearchActivityController::class, 'index']);
            Route::get('/create',            [ResearchActivityController::class, 'create']);
            Route::post('/',                 [ResearchActivityController::class, 'store']);
            Route::get('/{research}/edit',   [ResearchActivityController::class, 'edit']);
            Route::put('/{research}',        [ResearchActivityController::class, 'update']);
            Route::delete('/destroy',        [ResearchActivityController::class, 'destroy']);
        });

        Route::prefix('student-projects')->group(function () {
            Route::get('/',                      [StudentProjectController::class, 'index']);
            Route::get('/create',                [StudentProjectController::class, 'create']);
            Route::post('/',                     [StudentProjectController::class, 'store']);
            Route::get('/{studentProject}/edit', [StudentProjectController::class, 'edit']);
            Route::put('/{studentProject}',      [StudentProjectController::class, 'update']);
            Route::delete('/destroy',            [StudentProjectController::class, 'destroy']);
        });

        Route::prefix('departments')->group(function () {
            Route::get('/',                  [DepartmentController::class, 'index']);
            Route::get('/{department}/edit', [DepartmentController::class, 'edit']);
            Route::put('/{department}',      [DepartmentController::class, 'update']);
        });

        Route::prefix('lecturers')->group(function () {
            Route::get('/',                [LecturerController::class, 'index']);
            Route::get('/create',          [LecturerController::class, 'create']);
            Route::post('/',               [LecturerController::class, 'store']);
            Route::get('/{lecturer}/edit', [LecturerController::class, 'edit']);
            Route::put('/{lecturer}',      [LecturerController::class, 'update']);
            Route::delete('/destroy',      [LecturerController::class, 'destroy']);
        });

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
            Route::get('list', [UploadFileController::class, 'index']);
            Route::get('edit/{file}',[UploadFileController::class,'show']);
            Route::post('edit/{file}', [UploadFileController::class, 'update']);
            Route::DELETE('destroy', [UploadFileController::class, 'destroy']);
        });



    });

});
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'vi'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::get('/', [MainControllers::class, 'index']);
Route::get('/dccthp', [TrainingController::class, 'train']);
Route::get('/ctdt', [EduController::class, 'edu']);
Route::get('/ctdt22', [EduController::class, 'edu22']);
Route::get('/news', [NewsPublicController::class, 'index']);
Route::get('/news/{news}', [NewsPublicController::class, 'show']);
Route::get('/about', [FacultyPublicController::class, 'about']);
Route::get('/lecturers', [LecturerPublicController::class, 'index']);
Route::get('/research', [ResearchPublicController::class, 'index']);
Route::get('/student-projects', [StudentProjectPublicController::class, 'index']);
Route::get('/departments', [DepartmentPublicController::class, 'index']);
Route::get('/departments/{department:slug}', [DepartmentPublicController::class, 'show']);
Route::get('/contact', [ContactController::class, 'index']);





