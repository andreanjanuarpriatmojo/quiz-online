@extends('layout.ujian')

@section('custom-css')
<link rel="stylesheet" href="{{asset('codebase/src/assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('content')
    <div class="bg-dark" style="min-height:67px;">
    {{-- ini buat header biar bagus aja --}}
    </div>
    
    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="block">
                    <div class="block-header">
                        <h1 class="block-title">Soal No.{{ request('no') }}</h1>
                    </div>
                    <div class="block-content">
                        {!! $soal->deskripsi_soal !!}
                        @foreach (json_decode($ujian_siswa->random_jawaban) as $jawaban)
                        <br>
                        <div class="row">
                            <div class="col-1" style="max-width: 2%">
                                <label class="css-control css-control-secondary css-radio">
                                    <input type="radio" class="css-control-input jawaban" name="jawaban" value="{{ $jawaban }}" {{ $jawaban_siswa_nomer_ini == $jawaban ? 'checked' : '' }}>
                                    <span class="css-control-indicator"></span>
                                </label>
                            </div>
                            <div class="col-11">
                                {!! $soal->{"pilihan_".$jawaban} !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block">
                    <div class="block-header text-center">
                        <p class="p-10 bg-muted text-white">Sisa Waktu</p>
                        <p class="p-10 bg-primary text-white js-countdown font-w700"></p>
                    </div>
                    <div class="block-content text-center">
                        <div class="row">
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach (array_chunk(json_decode($ujian_siswa->random_soal), 5) as $ujian)
                            <div class="col-md-12">
                                @foreach ($ujian as $uj)
                                    @if ($nomor == request('no'))
                                    {{-- if current nomor maka biru --}}
                                    <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$nomor") }}" class="btn btn-sm btn-circle btn-alt-primary mr-5 mb-5" id="navigasi_{{ $nomor }}">{{ $nomor++ }}</a>
                                    @elseif($jawaban_siswa[$nomor-1] != '')
                                    {{-- if sudah dijawab maka ijo --}}
                                    <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$nomor") }}" class="btn btn-sm btn-circle btn-alt-success mr-5 mb-5" id="navigasi_{{ $nomor }}">{{ $nomor++ }}</a>
                                    @else
                                    {{-- if belum dijawab maka abu --}}
                                    <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$nomor") }}" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5" id="navigasi_{{ $nomor }}">{{ $nomor++ }}</a>
                                    @endif
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                </div>
                <div class="block text-center">
                    <div class="block-content">
                        <label class="css-control css-control-warning css-checkbox">
                            <input type="checkbox" class="css-control-input">
                            <span class="css-control-indicator"></span> Ragu-Ragu
                        </label>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <nav class="clearfix push">
                            @if ($prev_number)
                            <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$prev_number") }}" class="btn btn-primary" data-toggle="tooltip" title="Next">
                                <i class="fa fa-chevron-left fa-fw"></i> Soal Sebelumnya
                            </a>
                            @endif
                            @if ($next_number)
                            <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$next_number") }}" class="btn btn-primary float-right" data-toggle="tooltip" title="Next">
                                Soal Selanjutnya <i class="fa fa-chevron-right fa-fw"></i>
                            </a>
                            @else
                            <button type="button" class="btn btn-danger float-right js-swal-confirm" data-toggle="tooltip" title="Next">Akhiri Quiz <i class="fa fa-chevron-right fa-fw"></i></button>
                            {{-- <a href="{{ url("siswa/ujian/finish") }}" class="btn btn-danger float-right" data-toggle="tooltip" title="Next">
                                Akhiri Quiz <i class="fa fa-chevron-right fa-fw"></i>
                            </a> --}}
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection

@section('custom-js')
    <script src="{{ url('codebase/src/assets/js/plugins/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{asset('codebase/src/assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('codebase/src/assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>
        /*
        *  Document   : op_coming_soon.js
        *  Author     : pixelcave
        *  Description: Custom JS code used in Coming Soon Page
        */

        var OpComingSoon = function() {
            // Init Countdown.js, for more examples you can check out https://github.com/hilios/jQuery.countdown
            var initCounter = function(){
                jQuery('.js-countdown').countdown('{{ $ujian_siswa->waktu_selesai }}', function(event) {
                    jQuery(this).html(event.strftime('%H:%M:%S'));
                });
            };

            return {
                init: function () {
                    // Init Countdown
                    initCounter();
                }
            };
        }();

        // Initialize when page loads
        jQuery(function(){ OpComingSoon.init(); });
    </script>

    <script>
        $(".jawaban").change(function(){
            $.ajax({
                url: '{{ url('siswa/ujian/submit_jawaban') }}',
                type: 'POST',
                dataType: 'json',
                data : {
                    '_token': '{{ csrf_token() }}',
                    'ujian_siswa_id': '{{ $ujian_siswa->id }}',
                    'soal': {{ request('no') }},
                    'jawaban': $(this).val()
                },
                error: function(){
                    alert('Terjadi kesalahan. Coba logout lalu login lagi');
                },
                success: function(data){
                    console.log('ok');
                } 
            });
        });

        // Init an example confirm alert on button click
        $('.js-swal-confirm').on('click', function(){
            var url = $(this).val()
            console.log(url);
            swal({
                title: 'Apa anda yakin akan mengakhiri quiz?',
                text: 'Anda tidak akan dapat mengerjakan quiz ini lagi!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d26a5c',
                confirmButtonText: 'Ya, akhiri quiz',
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
                    window.location.href = '{{ url("siswa/ujian/$ujian_siswa->id/finish") }}';
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal('Cancelled', 'Silahkan lanjutkan ujian anda :)', 'success');
                }
            });
        });
    </script>
@endsection