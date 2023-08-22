@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <td>Order Id</td>
                <td>Customer</td>
                <td>Total</td>
                <td>Date</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach ($listInvoice as $key_o=>$invoice)
            <?php
                foreach($invoice['items'] as $key_i=>$item) {
                    $sum[$key_o][$key_i] = $item['pivot']['quantity'] * $item['pivot']['price'];
                }
            ?>
            <tr>
                <td>{{$invoice['id']}}</td>
                <td>{{$invoice['customer_name']}}</td>
                <td>{{array_sum($sum[$key_o])}}</td>
                <td>
                    <?php \Carbon\Carbon::setLocale('vi') ?>
                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($invoice['created_at']))->format('M d Y H:i:s') }}
                </td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection