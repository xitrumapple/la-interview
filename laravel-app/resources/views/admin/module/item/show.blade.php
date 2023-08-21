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
                    <a href="{{route('item_index_get')}}" class="btn btn-primary">ADD</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection