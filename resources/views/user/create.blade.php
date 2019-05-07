@extends('layout.app')
@section('title','Create User')
@section('additional_css')

@endsection
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <a class="breadcrumb-item" href="{{route('user.index')}}">User</a>
            <span class="breadcrumb-item active">Tambah User</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tambah user</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('user.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="username" placeholder="Masukkan username" required>
                                <label for="material-text">Username</label>
                            </div>
                            <div class="form-material">
                                <input type="password" class="form-control" id="material-text" name="password" placeholder="Masukan Password" required>
                                <label for="material-text">Password</label>
                            </div>
                            <div class="form-material">
                                <input type="password" class="form-control" id="material-text" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                <label for="material-text">Konfirmasi Password</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="name" placeholder="Masukkan Nama" required>
                                <label for="material-text">Nama</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="role" required>
                                    <option value="" selected disabled><-- Pilih Role User--></option>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                                <label for="material-text">Role</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection
@section('additional_js')

@endsection
