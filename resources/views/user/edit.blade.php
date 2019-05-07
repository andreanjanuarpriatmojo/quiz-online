@extends('layout.app')
@section('title','Edit User')
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
            <span class="breadcrumb-item active">Edit User</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit user</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('user.update', $user->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="username" placeholder="Masukkan username" required value="{{$user->username}}">
                                <label for="material-text">Username</label>
                            </div>
                            <div class="form-material">
                                <input type="password" class="form-control" id="material-text" name="password" placeholder="Masukan Password" autocomplete="off" required>
                                <label for="material-text">Password</label>
                            </div>
                            <div class="form-material">
                                <input type="password" class="form-control" id="material-text" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="off">
                                <label for="material-text">Konfirmasi Password</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="name" placeholder="Masukkan Nama" required  value="{{$user->name}}">
                                <label for="material-text">Nama</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="role" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="guru"  {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="siswa"  {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
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
