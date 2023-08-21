@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <!-- <tr>
                            <td colspan="8"><a href="#" class="btn btn-info">Add Order</a></td>
                        </tr> -->
            <tr>
                <td>Order Id</td>
                <td>Customer</td>
                <td>Total</td>
                <td>Date</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Parth Kotadiya</td>
                <td>₹ 1558.00</td>
                <td>26 Jul 2023 6:15 AM</td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Aniket</td>
                <td>₹ 17.90</td>
                <td>26 Jul 2023 6:15 AM</td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
        </table>
    </div>
</div>
@endsection