<!DOCTYPE html>
<html>

<head>
    <title>Larave Generate Invoice PDF</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#
                    {{ $invoice->id }}
                </span></p>
            <p class="m-0 pt-5 text-bold w-100">Customer Name - <span class="gray-color">
                    {{ $invoice->customer_name}}
                </span></p>
            <?php \Carbon\Carbon::setLocale('vi') ?>

            <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">
                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($invoice->created_at))->format('d M Y g:i a') }}
                </span>
            </p>
        </div>
        <div class="w-50 float-left logo mt-10">
            <!-- Load image logo -->
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">From</th>
                <th class="w-50">To</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>Gujarat</p>
                        <p>360004</p>
                        <p>Near Haveli Road,</p>
                        <p>Lal Darvaja,</p>
                        <p>India</p>
                        <p>Contact : 1234567890</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>Rajkot</p>
                        <p>360012</p>
                        <p>Hanumanji Temple,</p>
                        <p>Lati Ploat</p>
                        <p>Gujarat</p>
                        <p>Contact : 1234567890</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Shipping Method</th>
            </tr>
            <tr>
                <td>Cash On Delivery</td>
                <td>Free Shipping - Free Shipping</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">No</th>
                <th class="w-50">Category</th>
                <th class="w-50">Fruit</th>
                <th class="w-50">Unit</th>
                <th class="w-50">Price</th>
                <th class="w-50">Quantity</th>
                <th class="w-50">Amount</th>
            </tr>
            @php $total = 0; $i = 0 @endphp
            @if(session('editInvoice'))
            @foreach(session('editInvoice') as $id => $item)
            @php
            $i++;
            @endphp
            <tr align="center">
                <td>{{$i}}</td>
                <td>{{$item['cate_name']}}</td>
                <td>{{$item['item_name']}}</td>
                <td>{{$item['unit']}}</td>
                <td>${{$item['price']}}</td>
                <td>{{$item['quantity']}}</td>
                @php $total += $item['price']*$item['quantity'];@endphp
                <td>${{$item['price']*$item['quantity']}}</td>
            </tr>
            @endforeach
            @endif
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Tax (0%)</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>${{$total}}</p>
                            <p>$0</p>
                            <p>${{$total}}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</html>