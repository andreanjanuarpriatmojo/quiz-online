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
        $no = request('no');
        $ujian_siswa = UjianSiswa::findOrFail($ujian_siswa_id);
        $arr_index = $no - 1;
        $random_soal = json_decode($ujian_siswa->random_soal);
        $current_soal_id = $random_soal[$arr_index];

        $random_jawaban = json_decode($ujian_siswa->random_jawaban);

        $jawaban_siswa = json_decode($ujian_siswa->jawaban_siswa);
        $jawaban_siswa_nomer_ini = $jawaban_siswa[$arr_index];

        $soal = Soal::findOrFail($current_soal_id);
        $total_soal = count($random_jawaban);
        // dd($jawaban_siswa[$no] != '');
        $data = [
            'ujian_siswa' => $ujian_siswa,
            'soal' => $soal,
            'no' => $no,
            'jawaban_siswa_nomer_ini' => $jawaban_siswa_nomer_ini,
            'jawaban_siswa' => $jawaban_siswa,
            'total_soal' => $total_soal,
            'prev_number' => $no == 1 ? null : $no - 1,
            'next_number' => $no == $total_soal ? null : $no + 1,
        ];

        return view('ujian.ujian', $data);
    }

    public function submitJawaban(Request $request)
    {
        $ujian_siswa = UjianSiswa::findOrFail($request->input('ujian_siswa_id'));
        $jawaban_siswa = json_decode($ujian_siswa->jawaban_siswa);

        $index = $request->input('soal') - 1;
        $jawaban_siswa[$index] = $request->input('jawaban');
        $ujian_siswa->jawaban_siswa = json_encode($jawaban_siswa);
        $ujian_siswa->save();

        return response()->json('ok');
    }
}
