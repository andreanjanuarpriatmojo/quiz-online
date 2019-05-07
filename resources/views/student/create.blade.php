@extends('layout.app')
@section('content')
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-graduate"></i>
        Student
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="id_number" placeholder="ID Number" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>			
        </form>
    </div>
</div>
</div>
<div class="col-md-3"></div>
</div>
@endsection