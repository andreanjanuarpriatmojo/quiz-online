@extends('layout.app')
@section('content')
<div class="row">

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-user-graduate"></i>
          </div>
          <div class="mr-5">21 Total Student</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <div class="mr-5">11 Total Teacher</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-university"></i>
          </div>
          <div class="mr-5">11 Total Class</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-book"></i>
          </div>
          <div class="mr-5">123 Quiz</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="col-xl-12 col-sm-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h2>Welcome back, Nama Lengkap</h2>
                <h6>User Role</h6>

                <div id="alert" style="margin-top:5%;">
                    <div class="alert alert-danger col-xl-5">
                        <strong>Danger:</strong> you have uncomplete quiz!
                    </div>
                    <div class="alert alert-warning col-xl-5">
                        <strong>Warning:</strong> you have not given result!
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection