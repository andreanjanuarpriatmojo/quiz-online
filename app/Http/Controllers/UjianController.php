<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class UjianController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $now = Carbon::now();
        $current_ujian = $user->UjianSiswa()->where('waktu_mulai', '<', $now)->where('waktu_selesai', '>', $now)->orderBy('waktu_mulai', 'asc')->first();
        // dd($current_ujian);
        if($current_ujian)
        {
            $current_ujian = $current_ujian->JadwalUjian;
        }
        $data = [
            'user' => $user,
            'current_ujian' => $current_ujian
        ];

        return view('ujian.index', $data);
    }
}
