@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <form action="{{ route('invoice_create_post')  }}" method="POST" class="row g-3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Customer</td>
                    <td colspan="7">
                        <input type="text" pattern="[a-zA-Z0-9\s._\-]+" name="txtCustomerName"
                            value="{{Old('txtCustomerName')}}" placeholder="Please enter customer name" required
                            autofocus size="30">
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
                    <td>Action</td>
                </tr>
                @php $total = 0; $i = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $item)
                @php $i++ @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item['cate_name']}}</td>
                    <td>{{$item['item_name']}}</td>
                    <td>{{$item['unit']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>
                        <input type="number" pattern="[0-9]+" min="1" name="quantity[{{$id}}]"
                            value="{{$item['quantity']}}" required autofocus size="4" class="form-control quantity">
                    </td>
                    <td>{{$item['price']*$item['quantity']}}</td>
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
                    <td>{{$total}}</td>
                    <td>
                        <a class="btn btn-danger empty-cart" title="Remove Cart">Remove All</a>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' align='center'>
                        <!-- <button href="{{ route('update.cart') }}" class="btn btn-warning">Update Cart</button> -->
                        <a href="{{ route('all_item_get') }}" class="btn btn-info">Buy More</a>
                        <input type="submit" class="btn btn-success" value="Checkout" />
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

        if (confirm("Do you really want to delete?")) {
            $.ajax({
                url: "{{ route('remove.cart.item') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $(".empty-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to empty cart?")) {
            $.ajax({
                url: "{{ route('empty.cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $(".update-item").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ route('update.quantity.item') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

</script>
@endsection