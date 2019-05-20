@extends('layout.app')
@section('title','Jadwal Ujian')
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
            <span class="breadcrumb-item active">Peserta Ujian {{ $ujian->nama_ujian }}</span>
        </nav>
        @include('includes.flash_msg')
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Nama Ujian: <mark>{{ $ujian->nama_ujian }}</mark></h3>
                <div class="block-options">
                    Petunjuk: Klik untuk memodifikasi peserta ujian
                </div>
            </div> 
            <div class="block-content block-content-full">
                <form action="{{ url("jadwal_ujian/ganti_peserta") }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="jadwal_ujian_id" value="{{ $ujian->id }}">

                    <table class="js-table-checkable table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th class="d-none d-sm-table-cell">Nama Kelas</th>
                                <th class="d-none d-sm-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kelases as $kelas)
                            <tr>
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input" id="kelas_{{ $kelas->id }}" name="peserta[]" value="{{ $kelas->id }}">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>
                                    <a href="{{ url('#') }}" class="btn btn-info">Lihat Mahasiswa di Kelas Ini</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Fade In Modal -->
    <div class="modal fade" id="peserta_modal" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <input type="hidden" id="jadwal_ujian_id" value="">
                        <table class="js-table-checkable table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="d-none d-sm-table-cell">Nama Kelas</th>
                                    <th class="d-none d-sm-table-cell">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_1" name="row_1">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">Jose Parker</p>
                                        <p class="text-muted mb-0">Customer details and further information</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-danger">Disabled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">November 15, 2017 13:17</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_2" name="row_2">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">Andrea Gardner</p>
                                        <p class="text-muted mb-0">Customer details and further information</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-danger">Disabled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">November 21, 2017 13:17</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_3" name="row_3">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">Lori Moore</p>
                                        <p class="text-muted mb-0">Customer details and further information</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-info">Business</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">November 4, 2017 13:17</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_4" name="row_4">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">Danielle Jones</p>
                                        <p class="text-muted mb-0">Customer details and further information</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-danger">Disabled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">November 2, 2017 13:17</em>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input" id="row_5" name="row_5">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">Betty Kelley</p>
                                        <p class="text-muted mb-0">Customer details and further information</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-danger">Disabled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">November 10, 2017 13:17</em>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                        <i class="fa fa-check"></i> Perfect
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Fade In Modal -->
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
    // $(".button_peserta").click(function(){
    //     $("#jadwal_ujian_id").val($(this).val());
    // });
    @foreach ($selected_kelas as $kelas)
    $("#kelas_{{ $kelas->kelas_id }}").click();
    $("#kelas_{{ $kelas->kelas_id }}").closest('tr').addClass('table-active');
    @endforeach
        
    $(function () {
        Codebase.helpers('table-tools');
    });

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