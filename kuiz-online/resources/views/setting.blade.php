@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-cogs"></i>
        Setting
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Change Account Profile
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
                            <button type="submit" class="btn btn-primary btn-block">Change</button>			
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                <div class="card-header">
                    Change Account Password
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Re Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change</button>			
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection