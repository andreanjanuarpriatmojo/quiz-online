<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PaketSoal;
use App\Pelajaran;

class PaketSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pelajaran_id)
    {
        $data['paket_soals'] = PaketSoal::where('pelajaran_id',$pelajaran_id)->get();
        $data['pelajaran'] = Pelajaran::find($pelajaran_id);
        return view('paket_soal.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($pelajaran_id)
    // {
    //     $data['pelajarans'] = Pelajaran::all();
    //     return view('paket_soal.create',$data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama_paket' => 'required|max:100',
            'pelajaran_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $paket_soal = PaketSoal::create([
                'nama_paket' => $request['nama_paket'],
                'pelajaran_id' => $request['pelajaran_id'],
            ]);
            if($paket_soal)return redirect()->route('paket_soal.index',$request['pelajaran_id'])->withSuccess('Data Berhasil Ditambahkan');
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
        $data['paket_soal'] = PaketSoal::find($id);
        $data['pelajarans'] = Pelajaran::all();
        return view('paket_soal.edit',$data);
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
            'nama_paket' => 'required|max:100',
            'pelajaran_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $paket_soal = PaketSoal::find($id);
            $paket_soal->nama_paket = $request['nama_paket'];
            $paket_soal->pelajaran_id = $request['pelajaran_id'];
            if($paket_soal->save())return redirect()->route('paket_soal.index',$paket_soal->pelajaran_id)->withSuccess('Data Berhasil Dirubah');
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
        $data = PaketSoal::find($id);
        $data->delete();
    }
}
