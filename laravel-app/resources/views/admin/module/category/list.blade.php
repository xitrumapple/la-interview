@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td colspan="8"><a href="#" class="btn btn-info">Add Category</a></td>
                        </tr>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Slug</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Apple</td>
                            <td>apple</td>
                            <td><a href="#" class="btn btn-warning">Edit</a></td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Orange</td>
                            <td>Orange</td>
                            <td><a href="#" class="btn btn-warning">Edit</a></td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection