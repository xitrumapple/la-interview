@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{$title}}
    </div>

    <div class="card-body">
        <form action="" method="POST" class="row g-3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Customer</td>
                    <td colspan="6">
                        {{isset($customer_name) ? $customer_name : null}}
                    </td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>Category</td>
                    <td>Fruit</td>
                    <td>Unit</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Amount</td>
                </tr>
                @php $total = 0; $i = 0 @endphp
                @if(session('editInvoice'))
                @foreach(session('editInvoice') as $id => $item)
                @php
                $i++;
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item['cate_name']}}</td>
                    <td>{{$item['item_name']}}</td>
                    <td>{{$item['unit']}}</td>
                    <td id="price_{{$id}}">{{$item['price']}}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td id="amount_{{$id}}" class="amount">{{$item['price']*$item['quantity']}}</td>
                    @php $total += $item['price']*$item['quantity'];@endphp
                </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan='6' align='right'>Total</td>
                    <td id="total">{{$total}}</td>
                </tr>
                <tr>
                    <td colspan='7' align='center'>
                        <a href="{{route('generate_invoice_get', $id_invoice)}}" class="btn btn-info"
                            title="Print Invoice">
                            <i class="fa fa-print" aria-hidden="true"></i> Print Invoice
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection