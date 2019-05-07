@extends('layout.app')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Result - Quiz 1
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Student</th>
                <th>ID Number</th>
                <th>Point</th>
                <th>Grade</th>
                <th>State</th>
                <th class="text-center">Preview Test</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Student 1</td>
                <td>student00001</td>
                <td>80</td>
                <td>A</td>
                <td><span class="badge badge-success">Test is rated</span></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-table"></i> Show</a>
                </td>
            </tr>
            <tr>
                <td>Student 2</td>
                <td>student00002</td>
                <td>80</td>
                <td>A</td>
                <td><span class="badge badge-success">Test is rated</span></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-table"></i> Show</a>
                </td>
            </tr>
            <tr>
                <td>Student 3</td>
                <td>student00003</td>
                <td>80</td>
                <td>A</td>
                <td><span class="badge badge-success">Test is rated</span></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-table"></i> Show</a>
                </td>
            </tr>
            <tr>
                <td>Student 4</td>
                <td>student00004</td>
                <td></td>
                <td></td>
                <td><span class="badge badge-danger">Test is not rated</span></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-table"></i> Show</a>
                </td>
            </tr>
            <tr>
                <td>Student 5</td>
                <td>student00005</td>
                <td></td>
                <td></td>
                <td><span class="badge badge-danger">Test is not rated</span></td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-table"></i> Show</a>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
@endsection