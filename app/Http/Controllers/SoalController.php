<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Soal;
use App\PaketSoal;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paket_soal_id)
    {
        $data['soals'] = Soal::where('paket_soal_id',$paket_soal_id)->with(['paketsoal'])->get();
        $data['paket_soal'] = PaketSoal::find($paket_soal_id);
        return view('soal.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($paket_soal_id)
    {
        $data['paket_soal'] = PaketSoal::find($paket_soal_id);
        return view('soal.create',$data);
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
            'paket_soal_id' => 'required',
            'deskripsi_soal' => 'required',
            'pilihan_1' => 'required',
            'pilihan_2' => 'required',
            'pilihan_3' => 'required',
            'pilihan_4' => 'required',
            'jawaban' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $soal = Soal::create([
                'paket_soal_id' => $request['paket_soal_id'],
                'deskripsi_soal' => $request['deskripsi_soal'],
                'pilihan_1' => $request['pilihan_1'],
                'pilihan_2' => $request['pilihan_2'],
                'pilihan_3' => $request['pilihan_3'],
                'pilihan_4' => $request['pilihan_4'],
                'jawaban' => $request['jawaban'],
            ]);
            if($soal)return redirect()->route('soal.index',$request['paket_soal_id'])->withSuccess('Data Berhasil Ditambahkan');
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
        $data['soal'] = Soal::find($id);
        $data['paket_soal'] = PaketSoal::find($data['soal']->paket_soal_id);
        return view('soal.edit',$data);
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
            'paket_soal_id' => 'required',
            'deskripsi_soal' => 'required',
            'pilihan_1' => 'required',
            'pilihan_2' => 'required',
            'pilihan_3' => 'required',
            'pilihan_4' => 'required',
            'jawaban' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $soal = Soal::find($id);
            $soal->paket_soal_id = $request['paket_soal_id'];
            $soal->deskripsi_soal = $request['deskripsi_soal'];
            $soal->pilihan_1 = $request['pilihan_1'];
            $soal->pilihan_2 = $request['pilihan_2'];
            $soal->pilihan_3 = $request['pilihan_3'];
            $soal->pilihan_4 = $request['pilihan_4'];
            $soal->jawaban = $request['jawaban'];
            if($soal->save())return redirect()->route('soal.index',$request['paket_soal_id'])->withSuccess('Data Berhasil Dirubah');
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
        $data = Soal::find($id);
        $data->delete();
    }
}
