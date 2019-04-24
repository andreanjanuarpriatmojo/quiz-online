@extends('layout.app')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Result
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Quiz</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Quiz 1</td>
                <td>Class 1</td>
                <td>Teacher 1</td>
                <td>Subject 1</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="btn btn-info" role="button"><i class="fas fa-print"></i> Print</a>
                </td>
            </tr>
            <tr>
                <td>Quiz 2</td>
                <td>Class 2</td>
                <td>Teacher 2</td>
                <td>Subject 2</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="btn btn-info" role="button"><i class="fas fa-print"></i> Print</a>
                </td>
            </tr>
            <tr>
                <td>Quiz 3</td>
                <td>Class 3</td>
                <td>Teacher 3</td>
                <td>Subject 3</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="btn btn-info" role="button"><i class="fas fa-print"></i> Print</a>
                </td>
            </tr>
            <tr>
                <td>Quiz 4</td>
                <td>Class 4</td>
                <td>Teacher 4</td>
                <td>Subject 4</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="btn btn-info" role="button"><i class="fas fa-print"></i> Print</a>
                </td>
            </tr>
            <tr>
                <td>Quiz 5</td>
                <td>Class 5</td>
                <td>Teacher 5</td>
                <td>Subject 5</td>
                <td class="text-center">
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="btn btn-info" role="button"><i class="fas fa-print"></i> Print</a>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection