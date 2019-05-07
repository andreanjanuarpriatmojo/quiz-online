@extends('layout.ujian')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url('/codebase/src/assets/img/photos/photo34@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Welcome to QuizNow!</h2>
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Quiz Selanjutnya: Dasar Pemrograman</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row invisible" data-toggle="appear">
            <div class="col-6">
                <div class="row">
                    <!-- Row #1 -->
                    <div class="col-xl-6 col-12">
                        <a class="block block-link-pop text-right bg-corporate" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                <div class="float-left mt-10 d-none d-sm-block">
                                    <i class="si si-fire fa-3x text-corporate-light"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Nama Quiz</div>
                                <div class="font-size-h4 font-w600 text-white">UAS Dasprog 2019</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-12">
                        <a class="block block-link-pop text-right bg-elegance" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                <div class="float-left mt-10 d-none d-sm-block">
                                    <i class="si si-envelope-letter fa-3x text-elegance-light"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Durasi</div>
                                <div class="font-size-h4 font-w600 text-white"><span data-toggle="countTo" data-speed="1000" data-to="60">0</span> menit</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-12">
                        <a class="block block-link-pop text-right bg-primary" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                <div class="float-left mt-10 d-none d-sm-block">
                                    <i class="si si-bar-chart fa-3x text-primary-light"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Waktu Mulai</div>
                                <div class="font-size-h5 font-w600 text-white">17 Mei 2019 08:00:00</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-12">
                        <a class="block block-link-pop text-right bg-earth" href="javascript:void(0)">
                            <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                <div class="float-left mt-10 d-none d-sm-block">
                                    <i class="si si-trophy fa-3x text-earth-light"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Waktu Selesai</div>
                                <div class="font-size-h5 font-w600 text-white">17 Mei 2019 10:00:00</div>
                            </div>
                        </a>
                    </div>
                    <!-- END Row #1 -->
                </div>
            </div>

            <div class="col-6">
                <div class="block">
                    <div class="block-content block-content-full">
                        {{-- <i class="si si-game-controller fa-2x text-body-bg-dark"></i> --}}
                        <br>
                        <div class="row pt-10 text-center">
                            <div class="col-xl-6 col-12">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Quiz Akan Dimulai Dalam</div>
                                <div class="js-countdown mt-10"></div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="pt-20">
                                    <button class="btn btn-hero btn-lg btn-danger" disabled>QUIZ BELUM DIMULAI</button>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
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
                jQuery('.js-countdown').countdown('2019/05/09', function(event) {
                    jQuery(this).html(event.strftime('<div class="row items-push text-center">'
                            + '<div class="col-6 col-sm-3"><div class="font-size-h1 font-w700">%-D</div><div class="font-size-xs font-w700-op">HARI</div></div>'
                            + '<div class="col-6 col-sm-3"><div class="font-size-h1 font-w700">%H</div><div class="font-size-xs font-w700-op">JAM</div></div>'
                            + '<div class="col-6 col-sm-3"><div class="font-size-h1 font-w700">%M</div><div class="font-size-xs font-w700-op">MENIT</div></div>'
                            + '<div class="col-6 col-sm-3"><div class="font-size-h1 font-w700">%S</div><div class="font-size-xs font-w700-op">DETIK</div></div>'
                            + '</div>'
                    ));
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