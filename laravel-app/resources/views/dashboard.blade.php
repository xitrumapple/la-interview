@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">{{$title}}</div>

                <div class="row justify-content-center">
                    @foreach($listCate as $cate)
                    <div class="col-sm-2 m-2 mb-sm-2">
                        <div class="card">
                            @if (!empty($cate->image))
                            <img src="{{ asset('public/uploads/'.$cate->image) }}" width="286" height="180"
                                class="card-img-top">
                            @else
                            <img src="{{ asset('public/asset/image/default.png') }}" width="286" height="180"
                                class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::upper($cate->cate_name) }}</h5>
                                <p class="card-text text-danger">{{count($cate->items)}} Items</p>
                                <a href="{{route('cate_item_get', ['id' => $cate->id, 'title' => $cate->slug])}}"
                                    class="btn btn-primary">Go to Items</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection