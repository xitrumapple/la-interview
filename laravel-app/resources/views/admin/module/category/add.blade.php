@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="POST">
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
            <div class="mb-3">
                <label for="file"> <img src="{{ asset('public/asset/image/default.png') }}" id="defaultimg" height="150"
                        width="150" class="rounded" alt=""></label>

                <input type="file" id="file" name="image" class="form-control d-none">
            </div>
            <a href="{{route('cate_index_get')}}" class="btn btn-secondary">Cancel</a>
            <input type="submit" class="btn btn-primary" value="Add" />
        </form>
    </div>
</div>
@endsection

@section('script-viewcart')
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#defaultimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            //console.log(input.files[0]);
        }
    }

    $("#file").on('change', function () {
        readURL(this);
    });

</script>
@endsection