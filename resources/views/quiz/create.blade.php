@extends('layout.app')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-book"></i>
            Quiz
        </div>
        <form>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Quiz Properties
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="time" placeholder="Time in Minute" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="class" required>
                                            <option selected disabled>Select Class</option>
                                            <option value="#">Class 1</option>
                                            <option value="#">Class 2</option>
                                            <option value="#">Class 3</option>
                                            <option value="#">Class 4</option>
                                        </select>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" name="optradio" value="Tugas 1">Tugas 1
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" name="optradio" value="Tugas 2">Tugas 2
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" name="optradio" value="Tugas 3">Tugas 3
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" name="optradio" value="UTS">UTS
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" name="optradio" value="UAS">UAS
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Quiz Builder
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-secondary">Option</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-secondary">Short Answer</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-secondary">Yes or No</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-secondary">File</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection