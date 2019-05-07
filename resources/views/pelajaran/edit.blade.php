@extends('layout.app')
@section('title','Edit Pelajaran')
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
            <span class="breadcrumb-item active">Edit Pelajaran</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Pelajaran</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('pelajaran.update', $pelajaran->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="nama_pelajaran" placeholder="Masukkan nama pelajaran" required value="{{$pelajaran->nama_pelajaran}}">
                                <label for="material-text">Nama Pelajaran</label>
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

@endsection
