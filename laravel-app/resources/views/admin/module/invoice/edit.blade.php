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
                    <td colspan="7">
                        <input type="text" pattern="[a-zA-Z0-9\s._\-]+" name="txtCustomerName"
                            value="{{ old('txtCustomerName', isset($customer_name) ? $customer_name : null) }}"
                            placeholder="Please enter customer name" required autofocus size="30">
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>Category</td>
                    <td>Fruit</td>
                    <td>Unit</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Amount</td>
                    <td>Action</td>
                </tr>
                @php $total = 0; @endphp
                @if(session('editInvoice'))
                @foreach(session('editInvoice') as $id => $item)
                <tr id="item_{{$id}}">
                    <td>
                        @if (!empty($item['image']))
                        <img src="{{ asset('public/uploads/'.$item['image']) }}" width="70" height="70">
                        @else
                        <img src="{{ asset('public/asset/image/default.png') }}" width="70" height="70">
                        @endif
                    </td>
                    <td>{{$item['cate_name']}}</td>
                    <td>{{$item['item_name']}}</td>
                    <td>{{$item['unit']}}</td>
                    <td id="price_{{$id}}">{{$item['price']}}</td>
                    <td>
                        <input type="number" pattern="[0-9]+" min="1" name="quantity[{{$id}}]"
                            value="{{$item['quantity']}}" required autofocus size="4" class="form-control quantity">
                    </td>
                    <td id="amount_{{$id}}" class="amount">{{$item['price']*$item['quantity']}}</td>
                    @php $total += $item['price']*$item['quantity'];@endphp
                    <td>
                        <button class="btn btn-info btn-sm update-item" data-id="{{ $id }}"><i class="fa fa-refresh"
                                title="Update Item Quantity"></i></button>
                        <button class="btn btn-danger btn-sm remove-item" data-id="{{ $id }}"><i class="fa fa-trash-o"
                                title="Remove Item"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan='6' align='right'>Total</td>
                    <td id="total">{{$total}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan='8' align='center'>
                        <input type="submit" class="btn btn-success" value="Edit Invoice" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection

@section('script-viewcart')
<script type="text/javascript">

    $(".remove-item").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        var id = ele.attr("data-id");
        $get_amount = [];

        if (confirm("Do you really want to delete?")) {
            $.ajax({
                url: "{{ route('remove.invoice.item') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (response) {
                    if (typeof response == "object") {
                        alert(response.error);
                    } else {
                        $("tr#item_" + id).remove();

                        $('.amount').each(function () {
                            $get_amount.push($(this).html());
                        });

                        $get_amount = $get_amount.map(Number);
                        var $total = $get_amount.reduce(function (a, b) {
                            return a + b
                        }, 0);

                        $("#total").html($total);
                    }
                }
            });
        }
    });

    $(".update-item").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $id = ele.attr("data-id");
        $quantity = ele.parents("tr").find(".quantity").val();

        $get_amount = [];

        $.ajax({
            url: "{{ route('update.quantity.invoice.item') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: $id,
                quantity: $quantity
            },
            success: function (response) {
                if (typeof response == "object") {
                    alert(response.error);
                } else {
                    $price = $("#price_" + $id).html();

                    $("#amount_" + $id).html($price * $quantity);

                    $('.amount').each(function () {
                        $get_amount.push($(this).html());
                    });

                    $get_amount = $get_amount.map(Number);
                    var $total = $get_amount.reduce(function (a, b) {
                        return a + b
                    }, 0);

                    $("#total").html($total);

                    console.log($price + '-' + $quantity + '- ' + $price * $quantity);
                    console.log($get_amount + '-' + $total)
                }
            }
        });
    });

</script>
@endsection