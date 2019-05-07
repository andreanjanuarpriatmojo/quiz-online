<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JadwalUjian;
use App\Pelajaran;

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
                'waktu_mulai' => $request['waktu_mulai'],
                'waktu_selesai' => $request['waktu_selesai'],
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
            $jadwal_ujian = JadwalUjian::find($id);
            $jadwal_ujian->nama_ujian = $request['nama_ujian'];
            $jadwal_ujian->pelajaran_id = $request['pelajaran_id'];
            $jadwal_ujian->waktu_mulai = $request['waktu_mulai'];
            $jadwal_ujian->waktu_selesai = $request['waktu_selesai'];
            if($jadwal_ujian->save())return redirect()->route('jadwal_ujian.index')->withSuccess('Data Berhasil Dirubah');
            else return redirect()->back()->withErrors('Data Gagal Ditambahkan');
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
}
