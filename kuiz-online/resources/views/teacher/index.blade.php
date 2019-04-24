@extends('layout.app')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-tie"></i>
        Teacher
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-success fa-pull-right" role="button" style="margin-bottom:2%"><i class="fas fa-plus"></i> Add New</a>
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Teacher 1</td>
                <td>teacher00001</td>
                <td>teacher1@teacher.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Teacher 2</td>
                <td>teacher00002</td>
                <td>teacher2@teacher.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Teacher 3</td>
                <td>teacher00003</td>
                <td>teacher3@teacher.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Teacher 4</td>
                <td>teacher00004</td>
                <td>teacher4@teacher.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Teacher 5</td>
                <td>teacher00005</td>
                <td>teacher5@teacher.com</td>
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