@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ $title }}</div>

    <div class="row justify-content-center">
        @foreach($listItem as $item)
        <div class="col-sm-2 m-2 mb-sm-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->item_name}}</h5>
                    <p class="card-text">${{$item->price}} - {{$item->unit}}</p>
                    <a href="{{ route('additem.to.cart', $item->id) }}" class="btn btn-outline-danger">Add to cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection