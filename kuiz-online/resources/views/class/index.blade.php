@extends('layout.app')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-university"></i>
        Class
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-success fa-pull-right" role="button" style="margin-bottom:2%"><i class="fas fa-plus"></i> Add New</a>
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Class 1</td>
                <td>Teacher 1</td>
                <td>Subject 1</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Class 2</td>
                <td>Teacher 2</td>
                <td>Subject 2</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Class 3</td>
                <td>Teacher 3</td>
                <td>Subject 3</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Class 4</td>
                <td>Teacher 4</td>
                <td>Subject 4</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Class 5</td>
                <td>Teacher 5</td>
                <td>Subject 5</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection