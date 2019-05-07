@extends('layout.app')
@section('title','Create Jadwal Ujian')
@section('additional_css')

@endsection
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <a class="breadcrumb-item" href="{{route('jadwal_ujian.index')}}">Jadwal Ujian</a>
            <span class="breadcrumb-item active">Tambah Jadwal Ujian</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tambah Jadwal Ujian</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('jadwal_ujian.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="nama_ujian" placeholder="Masukkan nama ujian" required>
                                <label for="material-text">Nama Ujian</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="pelajaran_id" required>
                                    <option value="" selected disabled><-- Pilih Pelajaran--></option>
                                    @foreach($pelajarans as $pelajaran)
                                    <option value="{{$pelajaran->id}}">{{$pelajaran->nama_pelajaran}}</option>
                                    @endforeach
                                </select>
                                <label for="material-text">Pelajaran</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="datetime-local" class="form-control" id="material-text" name="waktu_mulai" required>
                                <label for="material-text">Waktu Mulai</label>
                            </div>
                            <div class="form-material">
                                <input type="datetime-local" class="form-control" id="material-text" name="waktu_selesai" required>
                                <label for="material-text">Waktu Selesai</label>
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
