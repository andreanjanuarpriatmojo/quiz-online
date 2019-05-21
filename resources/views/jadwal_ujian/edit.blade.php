@extends('layout.app')
@section('title','Edit Jadwal Ujian')
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
            <span class="breadcrumb-item active">Edit Jadwal Ujian</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Jadwal Ujian</h3>
            </div> 
            <div class="block-content">
                <form action="{{route('jadwal_ujian.update', $jadwal_ujian->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control" id="material-text" name="nama_ujian" placeholder="Masukkan nama ujian" required value="{{$jadwal_ujian->nama_ujian}}">
                                <label for="material-text">Nama Ujian</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="pelajaran_id" id="dropdown_pelajaran" required>
                                    @foreach($pelajarans as $pelajaran)
                                    <option value="{{$pelajaran->id}}" {{ $jadwal_ujian->pelajaran_id == $pelajaran->id ? 'selected' : '' }}>{{$pelajaran->nama_pelajaran}}</option>
                                    @endforeach
                                </select>
                                <label for="material-text">Pelajaran</label>
                            </div>
                            <div class="form-material">
                                <select class="form-control" name="paket_id" id="dropdown_paket" required>
                                    <option value="" selected disabled><-- Pilih Paket Soal--></option>
                                    @foreach ($pakets as $paket)
                                    <option value="{{$paket->id}}" {{ $jadwal_ujian->paket_soal_id == $paket->id ? 'selected' : '' }}>{{$paket->nama_paket}}</option>
                                    @endforeach
                                </select>
                                <label for="material-text">Paket Soal</label>
                            </div>
                            <div class="form-material">
                                <button type="submit" class="btn btn-alt-primary">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-material">
                                <input type="text" class="form-control datetimepicker-input" name="waktu_mulai"  id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" required value="{{$jadwal_ujian->waktu_mulai}}" autocomplete="off">
                                <label for="datetimepicker1">Waktu Mulai</label>
                            </div>
                            <div class="form-material">
                                <input type="text" class="form-control datetimepicker-input" name="waktu_selesai"  id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2" required value="{{$jadwal_ujian->waktu_selesai}}" autocomplete="off">
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
            format: 'YYYY-MM-DD hh:mm:ss',
            date: new Date({{ $jadwal_ujian->waktu_mulai->format('Y, m, d, H, i, s') }})
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss',
            date: new Date({{ $jadwal_ujian->waktu_selesai->format('Y, m, d, H, i, s') }})
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
