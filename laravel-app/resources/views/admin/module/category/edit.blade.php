@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="inputCateName" class="form-label">Name</label>
                <input type="text" name="txtCateName"
                    value="{{ old('txtCateName', isset($cate->cate_name) ? $cate->cate_name : null)  }}"
                    class="form-control" id="inputCateName">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" name="txtDescription"
                    value="{{ old('txtDescription', isset($cate->description) ? $cate->description : null)  }}"
                    class="form-control" id="inputDescription">
            </div>
            <div class="mb-3">
                <label for="editcat_image">
                    @if (!empty($cate->image))
                    <img src="{{ asset('public/uploads/'.$cate->image) }}" width="150" height="150" id="editshow_img"
                        class="rounded">
                    @else
                    <img src="{{ asset('public/asset/image/default.png') }}" width="150" height="150" id="editshow_img"
                        class="rounded">
                    @endif

                </label>
                <input type="file" class="form-control d-none" id="editcat_image" name="image">
            </div>
            <a href="{{route('cate_index_get')}}" class="btn btn-secondary">Cancel</a>
            <input type="submit" class="btn btn-primary" value="Edit" />
        </form>
    </div>
</div>
@endsection

@section('script-viewcart')
<script type="text/javascript">

    var imageInput = $("#editcat_image");
    imageInput.on("change", function () {
        if (imageInput[0].files && imageInput[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editshow_img')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };
            reader.readAsDataURL(imageInput[0].files[0]);
            //console.log(imageInput[0].files[0]);
        }
    })

</script>
@endsection