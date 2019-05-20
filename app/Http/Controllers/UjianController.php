<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $next_ujian = $user->UjianSiswa()->first();

        if($next_ujian)
        {
            $next_ujian = $next_ujian->JadwalUjian;
        }

        $data = [
            'user' => $user,
            'next_ujian' => $next_ujian
        ];

        return view('ujian.index', $data);
    }
}
