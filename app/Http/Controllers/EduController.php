<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    public function edu()
    {
        return view('ctdt', [
            'title' => 'Chương Trình Đào Tạo',

        ]);
    }

    public function edu22()
    {
        return view('ctdt22', [
            'title' => 'Chương Trình Đào Tạo Khoá 22',

        ]);
    }
}
