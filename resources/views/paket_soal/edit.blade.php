@extends('layout.app')
@section('title','Edit Paket Soal')
@section('additional_css')

@endsection
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <a class="breadcrumb-item" href="{{route('pelajaran.index')}}">Pelajaran</a>
            <a class="breadcrumb-item" href="{{route('paket_soal.index',$paket_soal->pelajaran_id)}}">Paket Soal</a>
            <span class="breadcrumb-item active">Edit Paket Soal</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Paket Soal</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('paket_soal.update', $paket_soal->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="nama_paket" placeholder="Masukkan nama paket" required value="{{$paket_soal->nama_paket}}">
                                <label for="material-text">Nama Paket</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <input type="hidden" name="pelajaran_id" value="{{$paket_soal->pelajaran_id}}">
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
