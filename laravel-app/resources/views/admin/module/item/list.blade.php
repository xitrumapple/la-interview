@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <td colspan="8"><a href="#" class="btn btn-info">Add Item</a></td>
            </tr>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Unit - Price</td>
                <td>Category</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ras El Hanout</td>
                <td>10.00 Gram -₹ 7.90</td>
                <td>Seasoning</td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Grass Cartoon</td>
                <td>10.00 Gram -₹ 7.90</td>
                <td>Grocery</td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
        </table>
    </div>
</div>
@endsection