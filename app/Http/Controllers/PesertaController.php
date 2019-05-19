<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use DB;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas_id)
    {
        $data['kelas'] = Kelas::with('user')->where('id',$kelas_id)->first();
        $data['users'] =  User::where('role','siswa')->get();

        return view('peserta.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::find($request->kelas);
        $user = User::find($request->username);

        $error = DB::select("Select * from user_kelas where user_id = '$user->id' and kelas_id = '$kelas->id'");
        if($error){
           return redirect()->back()->withErrors('Data Gagal Ditambahkan. Username Sudah ada'); 
        }
        $user->Kelas()->attach($kelas);
        return redirect()->route('peserta.index',$kelas->id)->withSuccess('Data Berhasil Ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas_id,$user_id)
    {
        $error = DB::delete("Delete from user_kelas where user_id = '$user_id' and kelas_id = '$kelas_id'");
    }
}
