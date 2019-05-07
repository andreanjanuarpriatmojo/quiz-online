<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">USERNAME</a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Activity -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-clock-o font-size-default mr-5"></i>Ujian yang Diikuti
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <ul class="list list-activity">
                        @for ($i = 0; $i < 5; $i++)
                        <li>
                            <i class="si si-wallet text-success"></i>
                            <div class="font-w600">Ujian Dasar Pemrograman {{ $i+1 }}</div>
                            <div class="font-size-xs text-muted">akan berlangsung 60 menit lagi</div>
                        </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <!-- END Activity -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->