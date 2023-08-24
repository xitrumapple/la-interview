@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <td colspan="8"><a href="{{route('item_create_get')}}" class="btn btn-info">Add Item</a></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Unit - Price</td>
                <td>Category</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach ($listItem as $item)
            <tr>
                <td>
                    @if (!empty($item->image))
                    <img src="{{ asset('public/uploads/'.$item->image) }}" width="70" height="70">
                    @else
                    <img src="{{ asset('public/asset/image/default.png') }}" width="70" height="70">
                    @endif
                </td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->unit}} - ${{$item->price}}</td>
                <td>{{$item->cates->cate_name}}</td>
                <td><a href="{{route('item_edit_get', ['id' => $item->id])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{route('item_delete_get', ['id' => $item->id])}}"
                        onclick="return confirmDel('Are you sure delete this item ?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection