@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="row justify-content-center">
                    @foreach($listCate as $cate)
                    <div class="col-sm-2 m-2 mb-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$cate->cate_name}}</h5>
                                <p class="card-text">{{count($cate->items)}} Items</p>
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