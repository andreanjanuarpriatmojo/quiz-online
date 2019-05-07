@extends('layout.app')
@section('title','dashboard')
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Quiz Online</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dashboard</h3>
            </div>
            <div class="block-content">
                <p>Selamat datang di Quiz Online. Anda Login sebagai <b>{{Auth::user()->role}}</b>  </p>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection