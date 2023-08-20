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
                            <td>Customer</td>
                            <td colspan="7">
                                <input type="text" name="customer" value="Nhan Cao" required autofocus>
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
                        <tr>
                            <td>1</td>
                            <td>Apple</td>
                            <td>Vietname small apple</td>
                            <td>pcs</td>
                            <td>2</td>
                            <td>
                                <input type="text" name="quantity" value="10" required autofocus>
                            </td>
                            <td>20</td>
                            <td><a href="#" class="btn btn-danger">Remove</a></td>
                        </tr>
                            <tr>
                            <td>2</td>
                            <td>Apple</td>
                            <td>China big apple</td>
                            <td>pack</td>
                            <td>8</td>
                            <td>
                                <input type="text" name="quantity" value="2" required autofocus>
                            </td>
                            <td>16</td>
                            <td><a href="#" class="btn btn-danger">Remove</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Orange</td>
                            <td>China small orange</td>
                            <td>kg</td>
                            <td>5</td>
                            <td>
                                <input type="text" name="quantity" value="3" required autofocus>
                            </td>
                            <td>15</td>
                            <td><a href="#" class="btn btn-danger">Remove</a></td>
                        </tr>
                        <tr>
                            <td colspan='6' align='right'>Total</td>
                            <td>51</td>
                            <td>
                                <a href="#" class="btn btn-danger">Remove All</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='8' align='center'>
                                <button href="#" class="btn btn-warning">Update Cart</button>
                                <a href="#" class="btn btn-info">Buy More</a>
                                <a href="#" class="btn btn-success">Checkout</a>						
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection