@extends('layout.app')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-graduate"></i>
        Student
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
                <td>Student 1</td>
                <td>student00001</td>
                <td>student1@student.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Student 2</td>
                <td>student00002</td>
                <td>student2@student.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Student 3</td>
                <td>student00003</td>
                <td>student3@student.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Student 4</td>
                <td>student00004</td>
                <td>student4@student.com</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning text-white" role="button"><i class="fas fa-edit"></i> Edit</a>
                    <form style="display:inline">
                    <a href="#" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Delete</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Student 5</td>
                <td>student00005</td>
                <td>student5@student.com</td>
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