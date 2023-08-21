@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <td colspan="8"><a href="{{route('cate_create_get')}}" class="btn btn-info">Add Category</a>
                </td>
            </tr>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Slug</td>
                <td>Description</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php $i = 0; ?>
            @foreach ($listCate as $cate)
            <?php $i++; ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$cate->cate_name}}</td>
                <td>{{$cate->slug}}</td>
                <td>{{$cate->description}}</td>
                <td><a href="{{route('cate_edit_get', ['id' => $cate->id])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{route('cate_delete_get', ['id' => $cate->id])}}"
                        onclick="return confirmDel('Are you sure delete this category ?')"
                        class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection