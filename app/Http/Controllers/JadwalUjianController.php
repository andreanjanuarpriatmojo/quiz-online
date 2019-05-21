<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JadwalUjian;
use App\Pelajaran;
use Carbon\Carbon;
use App\UjianKelas;
use App\Kelas;
use App\PaketSoal;
use App\UjianSiswa;
use App\Soal;
use DB;
use Uuid;

class JadwalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jadwal_ujians'] = JadwalUjian::all();
        return view('jadwal_ujian.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pelajarans'] = Pelajaran::all();
        return view('jadwal_ujian.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama_ujian' => 'required|max:100',
            'pelajaran_id' => 'required',
            'paket_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $jadwal_ujian = JadwalUjian::create([
                'nama_ujian' => $request['nama_ujian'],
                'pelajaran_id' => $request['pelajaran_id'],
                'paket_soal_id' => $request['paket_id'],
                'waktu_mulai' => Carbon::parse($request['waktu_mulai'], 'WIB'),
                'waktu_selesai' => Carbon::parse($request['waktu_selesai'], 'WIB'),
            ]);
            if($jadwal_ujian)return redirect()->route('jadwal_ujian.index')->withSuccess('Data Berhasil Ditambahkan');
            else return redirect()->back()->withErrors('Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['jadwal_ujian'] = JadwalUjian::find($id);
        $data['pelajarans'] = Pelajaran::all();
        $data['pakets'] = PaketSoal::where('pelajaran_id', $data['jadwal_ujian']->pelajaran_id)->get();
        return view('jadwal_ujian.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'nama_ujian' => 'required|max:100',
            'pelajaran_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            DB::beginTransaction();

            try {
                $jadwal_ujian = JadwalUjian::find($id);
                $jadwal_ujian->nama_ujian = $request['nama_ujian'];
                $jadwal_ujian->pelajaran_id = $request['pelajaran_id'];
                $jadwal_ujian->waktu_mulai = Carbon::parse($request['waktu_mulai'], 'WIB');
                $jadwal_ujian->waktu_selesai = Carbon::parse($request['waktu_selesai'], 'WIB');

                foreach ($jadwal_ujian->UjianSiswas as $ujian) 
                {
                    $ujian->waktu_mulai = $jadwal_ujian->waktu_mulai;
                    $ujian->waktu_selesai = $jadwal_ujian->waktu_selesai;
                    $ujian->save();
                }
                DB::commit();
                if($jadwal_ujian->save())return redirect()->route('jadwal_ujian.index')->withSuccess('Data Berhasil Dirubah');
                else return redirect()->back()->withErrors('Data Gagal Ditambahkan');
            } catch (\Exception $e) {
                DB::rollback();
                dd($e);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JadwalUjian::find($id);
        $data->delete();
    }

    public function peserta($id)
    {
        $ujian = JadwalUjian::findOrFail($id);
        $selected_kelas = UjianKelas::where('jadwal_ujian_id', $id)->get();
        // dd($selected_kelas);
        $kelases = Kelas::all();

        return view('jadwal_ujian.peserta', compact('kelases', 'ujian', 'selected_kelas'));
    }

    public function ganti_peserta(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $jadwal = JadwalUjian::findOrFail($request->input('jadwal_ujian_id'));
            $jadwal->KelasPeserta()->sync($request->input('peserta'));
            
            UjianSiswa::where('jadwal_ujian_id', $jadwal->id)->delete();

            $soal_id = $jadwal->PaketSoal->Soals->pluck('id')->toArray();
            $template_jawaban = [1, 2, 3, 4];
            $jawaban_kosong = array_fill(0, count($soal_id), '');

            if($request->input('peserta'))
            {
                foreach ($request->input('peserta') as $kelas) 
                {
                    $kelas = Kelas::findOrFail($kelas);
                    foreach ($kelas->User as $user) {
                        shuffle($soal_id);
                        shuffle($template_jawaban);

                        $data_check = [
                            'user_id' => $user->id,
                            'jadwal_ujian_id' => $jadwal->id
                        ];
                        $data = [
                            'id' => Uuid::generate(),
                            'random_soal' => json_encode($soal_id),
                            'random_jawaban' => json_encode($template_jawaban),
                            'jawaban_siswa' => json_encode($jawaban_kosong),
                            'waktu_mulai' => $jadwal->waktu_mulai,
                            'waktu_selesai' => $jadwal->waktu_selesai
                        ];

                        $ujian_siswa = UjianSiswa::firstOrCreate($data_check, $data);
                    }
                }
            }
            DB::commit();
            return redirect('/jadwal_ujian')->withSuccess('Peserta Berhasil Diubah');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            throw $e;
        }
    }

    public function getPaket(Request $request)
    {
        // dd('asdasd');
        $pelajaran = Pelajaran::findOrFail($request->pelajaran_id);
        $pakets = $pelajaran->PaketSoals;
        return response()->json($pakets);
    }

    public function hasil($jadwal_ujian_id)
    {
        $jadwal = JadwalUjian::findOrFail($jadwal_ujian_id);
        $kelases = $jadwal->KelasPeserta;
        
        $data = [
            'kelases' => $kelases,
            'jadwal_ujian' => $jadwal
        ];

        return view('jadwal_ujian.hasil', $data);
    }

    public function koreksi($jadwal_ujian_id)
    {
        $jadwal = JadwalUjian::findOrFail($jadwal_ujian_id);
        $kelases = $jadwal->KelasPeserta;

        DB::beginTransaction();

        try {
            foreach($kelases as $kelas)
            {
                $user_ids = $kelas->User()->pluck('users.id');
    
                foreach ($user_ids as $user_id) 
                {
                    $ujian_siswa = UjianSiswa::where('user_id', $user_id)->where('jadwal_ujian_id', $jadwal->id)->first();
                    if($ujian_siswa)
                    {
                        $jawaban_siswa = json_decode($ujian_siswa->jawaban_siswa);
                        $soal_ids = json_decode($ujian_siswa->random_soal);
                        $jumlah_benar = 0;

                        foreach ($soal_ids as $ind => $soal_id) 
                        {
                            $soal = Soal::findOrFail($soal_id);
                            if($soal->jawaban == $jawaban_siswa[$ind])
                            {
                                $jumlah_benar++;
                            }
                        }
                        
                        $total_soal = count($soal_ids);
                        $nilai = ($jumlah_benar / $total_soal) * 100;

                        $ujian_siswa->jumlah_benar = $jumlah_benar;
                        $ujian_siswa->nilai = $nilai;
                        $ujian_siswa->save();
                    }
                }
            }
            DB::commit();

            return back()->withSuccess('Hasil ujian telah dikoreksi ulang');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }
}
