@extends('layout.app')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-book"></i>
        Quiz
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-success fa-pull-right" role="button" style="margin-bottom:2%"><i class="fas fa-plus"></i> Add New</a>
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Type</th>
                <th class="text-center">Action</th>
                <th class="text-center">State</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Quiz 1</td>
                <td>Class 1</td>
                <td>Teacher 1</td>
                <td>UAS</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> Preview</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-success">Activate</button>
                </td>
            </tr>
            <tr>
                <td>Quiz 2</td>
                <td>Class 2</td>
                <td>Teacher 2</td>
                <td>UTS</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> Preview</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-success">Activate</button>
                </td>
            </tr>
            <tr>
                <td>Quiz 3</td>
                <td>Class 3</td>
                <td>Teacher 3</td>
                <td>Tugas 1</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> Preview</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger">Deactivate</button>
                </td>
            </tr>
            <tr>
                <td>Quiz 4</td>
                <td>Class 4</td>
                <td>Teacher 4</td>
                <td>UAS</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-primary" role="button"><i class="fas fa-eye"></i> Preview</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger">Deactivate</button>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection