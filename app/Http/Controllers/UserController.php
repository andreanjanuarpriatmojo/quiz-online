<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\user;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'username' => 'required|max:100',
            'password' => 'required|string|min:6|confirmed',
            'name'  => 'required|max:30',
            'role'  => 'required|max:30',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $user = User::create([
                'username' => $request['username'],
                'password' => bcrypt($request['password']),
                'name' => $request['name'],
                'role' => $request['role'],
            ]);
            if($user)return redirect()->route('user.index')->withSuccess('Data Berhasil Ditambahkan');
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
        $data['user'] = User::find($id);
        return view('user.edit',$data);
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
            'username' => 'required|max:100',
            'password' => 'required|string|min:6|confirmed',
            'name'  => 'required|max:30',
            'role'  => 'required|max:30',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{
            $user = User::find($id);
            $user->username = $request['username'];
            $user->password = bcrypt($request['password']);
            $user->name = $request['name'];
            $user->role = $request['role'];
            if($user->save())return redirect()->route('user.index')->withSuccess('Data Berhasil Dirubah');
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
        $data = User::find($id);
        $data->delete();
    }
}
