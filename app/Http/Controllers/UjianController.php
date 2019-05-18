<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [
            'user' => $user
        ];

        return view('ujian.index', $data);
    }
}
