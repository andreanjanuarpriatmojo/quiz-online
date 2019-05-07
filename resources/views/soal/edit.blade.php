@extends('layout.app')
@section('title','Edit Soal')
@section('additional_css')

@endsection
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <a class="breadcrumb-item" href="{{route('soal.index')}}">Soal</a>
            <span class="breadcrumb-item active">Edit Soal</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Soal</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('soal.update', $soal->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-material">
                                <select class="form-control" name="paket_soal_id" required>
                                    <option value="" selected disabled><-- Pilih Paket Soal--></option>
                                    @foreach($paket_soals as $paket_soal)
                                    <option value="{{$paket_soal->id}}" {{ $soal->paket_soal_id == $paket_soal->id ? 'selected' : '' }}>{{$paket_soal->nama_paket}} ({{$paket_soal->pelajaran->nama_pelajaran}})</option>
                                    @endforeach
                                </select>
                                <label for="material-text">Paket Soal (Pelajaran)</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor" name="deskripsi_soal">{{$soal->deskripsi_soal}}</textarea>
                                <label for="material-text">Deskripsi Soal</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor2" name="pilihan_1">{{$soal->pilihan_1}}</textarea>
                                <label for="material-text">Pilihan 1</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor3" name="pilihan_2">{{$soal->pilihan_2}}</textarea>
                                <label for="material-text">Pilihan 2</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor4" name="pilihan_3">{{$soal->pilihan_3}}</textarea>
                                <label for="material-text">Pilihan 3</label>
                            </div>
                            <div class="form-material">
                                <textarea id="js-ckeditor5" name="pilihan_4">{{$soal->pilihan_4}}</textarea>
                                <label for="material-text">Pilihan 4</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="jawaban" required>
                                    <option value="" selected disabled><-- Pilih Jawaban Benar--></option>
                                    <option value="1" {{ $soal->jawaban == '1' ? 'selected' : '' }}>Pilihan 1</option>
                                    <option value="2" {{ $soal->jawaban == '2' ? 'selected' : '' }}>Pilihan 2</option>
                                    <option value="3" {{ $soal->jawaban == '3' ? 'selected' : '' }}>Pilihan 3</option>
                                    <option value="4" {{ $soal->jawaban == '4' ? 'selected' : '' }}>Pilihan 4</option>
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
