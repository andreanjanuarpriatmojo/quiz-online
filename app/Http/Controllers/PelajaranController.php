<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pelajaran;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pelajarans'] = Pelajaran::all();
        return view('pelajaran.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajaran.create');
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
            'nama_pelajaran' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $pelajaran = Pelajaran::create([
                'nama_pelajaran' => $request['nama_pelajaran'],
            ]);
            if($pelajaran)return redirect()->route('pelajaran.index')->withSuccess('Data Berhasil Ditambahkan');
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
        $data['pelajaran'] = Pelajaran::find($id);
        return view('pelajaran.edit',$data);
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
           'nama_pelajaran' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $pelajaran = Pelajaran::find($id);
            $pelajaran->nama_pelajaran = $request['nama_pelajaran'];
            if($pelajaran->save())return redirect()->route('pelajaran.index')->withSuccess('Data Berhasil Dirubah');
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
        $data = Pelajaran::find($id);
        $data->delete();
    }
}
