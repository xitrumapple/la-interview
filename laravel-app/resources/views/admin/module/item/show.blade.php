@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">{{ $title }}</div>

    <div class="row justify-content-center">
        @foreach($listItem as $item)
        <div class="col-sm-2 m-2 mb-sm-2">
            <div class="card">
                @if (!empty($item->image))
                <img src="{{ asset('public/uploads/'.$item->image) }}" width="286" height="180" class="card-img-top">
                @else
                <img src="{{ asset('public/asset/image/default.png') }}" width="286" height="180" class="card-img-top">
                @endif
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