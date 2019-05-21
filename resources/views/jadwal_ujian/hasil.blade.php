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
            <span class="breadcrumb-item active">Jadwal Ujian</span>
        </nav>
        @include('includes.flash_msg')
        <!-- Block Tabs Alternative Style -->
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-block align-items-center js-tabs-enabled" data-toggle="tabs" role="tablist">
                @foreach ($kelases as $kelas)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" href="#kelas_{{ $kelas->id }}">{{ $kelas->nama_kelas }}</a>
                </li>
                @endforeach
                <li class="nav-item ml-auto">
                    <div class="block-options mr-15">
                        <a class="btn-block-option" href="{{ url("jadwal_ujian/$jadwal_ujian->id/koreksi") }}" id="refresh_button">
                            <i class="si si-refresh"></i> Koreksi 
                        </a>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content">
                @foreach ($kelases as $kelas)
                <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="kelas_{{ $kelas->id }}" role="tabpanel">
                    <h4 class="font-w400">Hasil Ujian</h4>
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Benar</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kelas->user as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    @php
                                        $ujian_siswa = $user->UjianSiswa()->where('jadwal_ujian_id', $jadwal_ujian->id)->first();
                                    @endphp
                                    <td>{{ $ujian_siswa->jumlah_benar }}</td>
                                    <td>{{ $ujian_siswa->nilai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
        <!-- END Block Tabs Alternative Style -->
    </div>
    <!-- END Page Content -->

    {{-- <!-- Fade In Modal -->
    <div class="modal fade" id="kelas_modal" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
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
                        <table class="table table-hover" id="peserta_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
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
    <!-- END Fade In Modal --> --}}
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
    
    // $("#peserta_datatable").dataTable({
    //     serverSide: true,
    //     processing: true,
    //     ajax: {
    //         url: "{{ url('jadwal_ujian/peserta/datatables') }}",
    //         type: "POST",
    //         "data": function (d) {
    //             d._token = "{{ csrf_token() }}";
    //             d.jadwal_ujian_id = $("#jadwal_ujian_id").val();
    //         }
    //     }
    //     columns: [
    //         { name: 'first_name' },
    //         { name: 'last_name' },
    //         { name: 'mobile' },
    //         { name: 'email' },
    //         { name: 'gender' },
    //         { name: 'country' }
    //     ],
    // });


    // Init an example confirm alert on button click
    // $('.js-swal-confirm').on('click', function(){
    //     var url = $(this).val()
    //     console.log(url);
    //     swal({
    //         title: 'Apa anda yakin akan menghapus data ini?',
    //         text: 'Data yang telah dihapus tidak bisa dikembalikan!',
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d26a5c',
    //         confirmButtonText: 'Ya, hapus data',
    //         html: false,
    //         preConfirm: function() {
    //             return new Promise(function (resolve) {
    //                 setTimeout(function () {
    //                     resolve();
    //                 }, 50);
    //             });
    //         }
    //     }).then(function(result){
    //         if (result.value) {
    //             $.ajax({
    //                 url: url,
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 type: 'DELETE',
    //                 success: function(result) {
    //                     console.log('Data deleted');
    //                 }
    //             });
    //             swal('Deleted!', 'Data anda berhasil dihapus.', 'success')
    //             .then(function(result){
    //                 location.reload();
    //             });
    //             // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
    //         } else if (result.dismiss === 'cancel') {
    //             swal('Cancelled', 'Data anda batal dihapus', 'error');
    //         }
    //     });
    // });
</script>
@endsection