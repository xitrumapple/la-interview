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
                <td>Action</td>
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
                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($invoice['created_at']))->format('d M Y g:i a') }}
                </td>
                <td>
                    <a href="{{ route('invoice_edit_get', $invoice['id']) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('invoice_delete_get', $invoice['id']) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('page_invoice_get', $invoice['id']) }}" class="btn btn-info"
                        title="Print Invoice">
                        <i class="fa fa-print" aria-hidden="true"></i> Print Invoice
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection