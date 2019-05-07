@extends('layout.app')
@section('content')
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-university"></i>
        Class
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" name="class" placeholder="Class" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <div class="row text-center" style="margin-bottom:2.5%">
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary"><i class="fas fa-plus-square"></i> Add Teacher</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary"><i class="fas fa-plus-square"></i> Add Student</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>			
        </form>
    </div>
</div>
</div>
<div class="col-md-3"></div>
</div>
@endsection