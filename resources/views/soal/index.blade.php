@extends('layout.app')
@section('title','Soal')
@section('additional_css')
<link rel="stylesheet" href="{{asset('codebase/src/assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('codebase/src/assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <span class="breadcrumb-item active">Soal</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Soal</h3>
                <div class="block-options">
                    <a href="{{route('soal.create')}}" class="btn btn-primary text-primary-lighter">Tambah Baru</a>
                </div>
            </div> 
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>Nama Pelajaran</th>
                            <th class="d-none d-sm-table-cell">Nama Paket</th>
                            <th class="d-none d-sm-table-cell">Deskripsi Soal</th>
                            <th class="d-none d-sm-table-cell text-center">Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soals as $soal)
                        <tr>
                            <td class="font-w600">{{$soal->paketsoal->pelajaran->nama_pelajaran}}</td>
                            <td class="d-none d-sm-table-cell">{{$soal->paketsoal->nama_paket}}</td>
                            <td class="d-none d-sm-table-cell">{!! $soal->deskripsi_soal !!}</td>
                            <td class="text-center">
                                <a href="{{route('soal.edit',$soal->id)}}" class="btn btn-warning">Edit</a>
                                <button type="button" value="{{route('soal.destroy',$soal->id)}}" class="btn btn-danger js-swal-confirm">Delete</button>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection
@section('additional_js')
<script src="{{asset('codebase/src/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('codebase/src/assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
<script src="{{asset('codebase/src/assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
 <!-- Page JS Plugins -->
<script src="{{asset('codebase/src/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('codebase/src/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('codebase/src/assets/js/pages/be_tables_datatables.js')}}"></script>
<script type="text/javascript">
    // Init an example confirm alert on button click
    $('.js-swal-confirm').on('click', function(){
        var url = $(this).val()
        console.log(url);
        swal({
            title: 'Apa anda yakin akan menghapus data ini?',
            text: 'Data yang telah dihapus tidak bisa dikembalikan!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d26a5c',
            confirmButtonText: 'Ya, hapus data',
            html: false,
            preConfirm: function() {
                return new Promise(function (resolve) {
                    setTimeout(function () {
                        resolve();
                    }, 50);
                });
            }
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    success: function(result) {
                        console.log('Data deleted');
                    }
                });
                swal('Deleted!', 'Data anda berhasil dihapus.', 'success')
                .then(function(result){
                    location.reload();
                });
                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
                swal('Cancelled', 'Data anda batal dihapus', 'error');
            }
        });
    });
</script>
@endsection
