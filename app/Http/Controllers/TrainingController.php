<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function train()
    {
        return view('dccthp', [
            'title' => 'Đề cương môn học',

        ]);
    }
}
