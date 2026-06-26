<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function create()
    {
        return view('admin.file.add',[
            'title' => 'Upload File mới',
        ]);
    }

    public function store()
    {
       
    }

    public function index()
    {
        return view('admin.file.list',[
            'title' => 'Danh sách FileUpload',
          /*  'menus' => $this -> menuService ->getAll()*/
        ]);
    }
}
