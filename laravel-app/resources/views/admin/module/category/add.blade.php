@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="inputCateName" class="form-label">Name</label>
                <input type="text" name="txtCateName" value="{{Old('txtCateName')}}" class="form-control"
                    id="inputCateName">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" name="txtDescription" value="{{Old('txtDescription')}}" class="form-control"
                    id="inputDescription">
            </div>
            <a href="{{route('cate_index_get')}}" class="btn btn-secondary">Cancel</a>
            <input type="submit" class="btn btn-primary" value="Add" />
        </form>
    </div>
</div>
@endsection