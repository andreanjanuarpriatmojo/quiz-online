@extends('layout.app')
@section('title','Create Jadwal Ujian')
@section('additional_css')
<link rel="stylesheet" href="{{asset('codebase/src/assets/css/tempusdominus-bootstrap-4.min.css')}}" />
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
                                <select class="form-control" name="pelajaran_id" id="dropdown_pelajaran" required>
                                    <option value="" selected disabled><-- Pilih Pelajaran--></option>
                                    @foreach($pelajarans as $pelajaran)
                                    <option value="{{$pelajaran->id}}">{{$pelajaran->nama_pelajaran}}</option>
                                    @endforeach
                                </select>
                                <label for="material-text">Pelajaran</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="paket_id" id="dropdown_paket" required disabled>
                                    <option value="" selected disabled><-- Pilih Paket Soal--></option>
                                </select>
                                <label for="material-text">Paket Soal</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control datetimepicker-input" name="waktu_mulai"  id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" required autocomplete="off">
                                <label for="datetimepicker1">Waktu Mulai</label>
                            </div>
                            <div class="form-material">
                                <input type="text" class="form-control datetimepicker-input" name="waktu_selesai"  id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2" required autocomplete="off">
                                <label for="datetimepicker2">Waktu Selesai</label>
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
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss'
        });
    });

    $("#dropdown_pelajaran").change(function(){
        $.ajax({
            url: '{{ url('jadwal_ujian/ajax/get_paket') }}',
            type: 'GET',
            data: {
                'pelajaran_id': $(this).val()
            },
            dataType: 'json',
            error: function(){
                alert('error');
            },
            success: function(data){
                $("#dropdown_paket").prop('disabled', false);
                $("#dropdown_paket").empty();
                $("#dropdown_paket").append('<option value="" selected disabled><-- Pilih Paket Soal--></option>');
                $.each(data, function(index, val){
                    var html = '<option value="'+val.id+'">'+val.nama_paket+'</option>';
                    $("#dropdown_paket").append(html);
                });
            }
        })
    });
</script>
<script src="{{asset('codebase/src/assets/js/moment.js')}}"></script>
<script src="{{asset('codebase/src/assets/js/tempusdominus-bootstrap-4.min.js')}}"></script>
@endsection
