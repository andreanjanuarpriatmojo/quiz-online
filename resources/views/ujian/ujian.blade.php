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
                            <input type="radio" class="css-control-input" name="radio-group1" checked>
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
                        <p class="p-10 bg-primary text-white">00:30:00</p>
                    </div>
                    <div class="block-content text-center">
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            1
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            2
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            3
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            4
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            5
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            6
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            7
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            8
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            9
                        </button>
                        <button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                            10
                        </button>
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