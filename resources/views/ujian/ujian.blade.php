@extends('layout.ujian')

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
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="jawaban">
                            <span class="css-control-indicator"></span> {!! $soal->{"pilihan_".$jawaban} !!}
                        </label>
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
                                <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$nomor") }}" class="btn btn-sm btn-circle {{ $nomor == request('no') ? 'btn-alt-primary' : 'btn-alt-secondary' }} mr-5 mb-5">{{ $nomor++ }}</a>
                                @endforeach
                            </div>
                            @endforeach
                            {{-- <div class="col-md-12">
                            @for ($i = 1; $i <= 10; $i++)
                                <a href="{{ url("siswa/ujian/$ujian_siswa->id?no=$i") }}" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                                    {{ $i }}
                                </a>
                                @if ($i % 5 == 0)
                                </div>
                                @if ($i != $total_soal-1)
                                <div class="col-md-12">
                                @endif
                                @endif
                            @endfor --}}
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
@endsection