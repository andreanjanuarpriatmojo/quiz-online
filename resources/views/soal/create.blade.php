@extends('layout.app')
@section('title','Create Soal')
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
            <a class="breadcrumb-item" href="{{route('paket_soal.index',$paket_soal->pelajaran->id)}}">Paket Soal</a>
            <a class="breadcrumb-item" href="{{route('soal.index',$paket_soal->id)}}">Soal</a>
            <span class="breadcrumb-item active">Tambah Soal</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tambah Soal</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('soal.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="hidden" name="paket_soal_id" value="{{$paket_soal->id}}">
                            <div class="form-material">
                                <textarea id="js-ckeditor" name="deskripsi_soal">Masukan Deskripsi Soal</textarea>
                                <label for="material-text">Deskripsi Soal</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor2" name="pilihan_1">Masukan Pilihan 1</textarea>
                                <label for="material-text">Pilihan 1</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor3" name="pilihan_2">Masukan Pilihan 2</textarea>
                                <label for="material-text">Pilihan 2</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor4" name="pilihan_3">Masukan Pilihan 3</textarea>
                                <label for="material-text">Pilihan 3</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor5" name="pilihan_4">Masukan Pilihan 4</textarea>
                                <label for="material-text">Pilihan 4</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="jawaban" required>
                                    <option value="" selected disabled><-- Pilih Jawaban Benar--></option>
                                    <option value="1">Pilihan 1</option>
                                    <option value="2">Pilihan 2</option>
                                    <option value="3">Pilihan 3</option>
                                    <option value="4">Pilihan 4</option>
                                </select>
                                <label for="material-text">Jawaban Benar</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
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
<script src="{{asset('codebase/src/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'js-ckeditor' );
    CKEDITOR.replace( 'js-ckeditor2' );
    CKEDITOR.replace( 'js-ckeditor3' );
    CKEDITOR.replace( 'js-ckeditor4' );
    CKEDITOR.replace( 'js-ckeditor5' );
</script>
@endsection
