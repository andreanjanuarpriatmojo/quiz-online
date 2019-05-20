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
                        <h1 class="block-title">Soal No 1</h1>
                    </div>
                    <div class="block-content">
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <br>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="radio-group1" checked>
                            <span class="css-control-indicator"></span> Option 1
                        </label>
                        <br>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="radio-group1" checked>
                            <span class="css-control-indicator"></span> Option 2
                        </label>
                        <br>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="radio-group1" checked>
                            <span class="css-control-indicator"></span> Option 3
                        </label>
                        <br>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="radio-group1" checked>
                            <span class="css-control-indicator"></span> Option 4
                        </label>
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
                    <div class="block-content text-center row">
                        <div class="col-md-12">
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
                        </div>
                        <div class="col-md-12">
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="tooltip" title="Next">
                                    Selanjutnya <i class="fa fa-chevron-right fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-primary float-left" data-toggle="tooltip" title="Previous">
                                <i class="fa fa-chevron-left fa-fw"></i> Sebelumnya
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection