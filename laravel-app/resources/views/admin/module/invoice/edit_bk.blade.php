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
                            value="{{ old('txtCustomerName', isset($customer_name) ? $customer_name : null) }}"
                            placeholder="Please enter customer name" required autofocus size="30">
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
                @foreach($items as $item)
                @php $i++ @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->cates->cate_name }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->pivot->price }}</td>
                    <td>
                        <input type="number" pattern="[0-9]+" min="1" name="quantity[{{ $item->id }}]"
                            value="{{ $item->pivot->quantity }}" required autofocus size="4"
                            class="form-control quantity">
                    </td>
                    <td>{{ $item->pivot->price*$item->pivot->quantity }}</td>
                    @php $total +=$item->pivot->price*$item->pivot->quantity; @endphp
                    <td>
                        <button class="btn btn-info btn-sm update-item" data-id="{{ $item->id }}"><i
                                class="fa fa-refresh" title="Update Item Quantity"></i></button>
                        <button class="btn btn-danger btn-sm remove-item" data-id="{{ $item->id }}"><i
                                class="fa fa-trash-o" title="Remove Item"></i></button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan='6' align='right'>Total</td>
                    <td>{{$total}}</td>
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