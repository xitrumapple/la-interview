@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="row justify-content-center">
                    <div class="col-sm-2 m-2 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Apple</h5>
                                <p class="card-text">7 Products</p>
                                <a href="{{route('item_get')}}" class="btn btn-primary">Go to items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Apple</h5>
                                <p class="card-text">7 Products</p>
                                <a href="{{route('item_get')}}" class="btn btn-primary">Go to items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Apple</h5>
                                <p class="card-text">7 Products</p>
                                <a href="{{route('item_get')}}" class="btn btn-primary">Go to items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Apple</h5>
                                <p class="card-text">7 Products</p>
                                <a href="{{route('item_get')}}" class="btn btn-primary">Go to items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Apple</h5>
                                <p class="card-text">7 Products</p>
                                <a href="{{route('item_index_get')}}" class="btn btn-primary">Go to items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection