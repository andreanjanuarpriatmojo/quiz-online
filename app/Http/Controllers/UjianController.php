<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Soal;
use App\UjianSiswa;

class UjianController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $now = Carbon::now();
        $current_ujian_siswa = $user->UjianSiswa()->where('waktu_mulai', '<', $now)->where('waktu_selesai', '>', $now)->orderBy('waktu_mulai', 'asc')->first();
        // dd($current_ujian_siswa);
        if($current_ujian_siswa)
        {
            $current_jadwal_ujian = $current_ujian_siswa->JadwalUjian;
        }
        $data = [
            'user' => $user,
            'current_ujian' => $current_jadwal_ujian,
            'ujian_siswa_id' => $current_ujian_siswa->id
        ];

        return view('ujian.index', $data);
    }

    public function getUjian($ujian_siswa_id)
    {
        $ujian_siswa = UjianSiswa::findOrFail($ujian_siswa_id);
        $arr_index = request('no') - 1;
        $random_jawaban = json_decode($ujian_siswa->random_jawaban);
        $current_soal_id = $random_jawaban[$arr_index];

        $soal = Soal::findOrFail($current_soal_id);
        
        $data = [
            'ujian_siswa' => $ujian_siswa,
            'soal' => $soal,
            'prev_number' => request('no') == 1 ? null : request('no') - 1,
            'next_number' => request('no') == count($random_jawaban) ? null : request('no') + 1,
        ];

        return view('ujian.ujian', $data);
    }
}
