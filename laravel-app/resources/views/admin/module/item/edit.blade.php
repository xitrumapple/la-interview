@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{$title}}</div>

    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="POST" class="row g-3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-6">
                <label for="inputItem" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="inputItem" name="txtItemName"
                    value="{{ old('txtItemName', isset($item->item_name) ? $item->item_name : null)  }}">
            </div>
            <div class="col-md-6">
                <label for="inputCategory" class="form-label">Select Category</label>
                <select name="sltCate" id="inputCategory" class="form-select">
                    <option value="">Choose...</option>
                    @foreach($cates as $cate)
                    @if($cate->id == $item->cate_id)
                    <option value="{{ $cate->id }}" selected>
                        {{ $cate->cate_name }}
                    </option>
                    @else
                    <option value="{{ $cate->id }}" @selected(old('sltCate')==$cate->id)>
                        {{ $cate->cate_name }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputUnit" class="form-label">Select Unit</label>
                <select name="sltUnit" id="inputUnit" class="form-select">
                    <option value="">Choose...</option>
                    <option value="g" @selected($item->unit == 'g') @selected(old('sltUnit')=='g')>g</option>
                    <option value="kg" @selected($item->unit == 'kg') @selected(old('sltUnit')=='kg')>kg</option>
                    <option value="pcs" @selected($item->unit == 'pcs') @selected(old('sltUnit')=='pcs')>pcs</option>
                    <option value="pack" @selected($item->unit == 'pack') @selected(old('sltUnit')=='pack')>pack
                    </option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" pattern="[0-9]+" min="1" class="form-control" id="inputPrice" name="txtPrice"
                    value="{{ old('txtPrice', isset($item->price) ? $item->price : null)  }}">
            </div>
            <div class="col-mb-3">
                <label for="edititem_image">
                    @if (!empty($item->image))
                    <img src="{{ asset('public/uploads/'.$item->image) }}" width="150" height="150" id="editshow_img"
                        class="rounded">
                    @else
                    <img src="{{ asset('public/asset/image/default.png') }}" width="150" height="150" id="editshow_img"
                        class="rounded">
                    @endif

                </label>
                <input type="file" class="form-control d-none" id="edititem_image" name="image">
            </div>
            <div class="col-12">
                <a href="{{route('item_index_get')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Edit Item" />
            </div>
        </form>
    </div>
</div>
@endsection

@section('script-viewcart')
<script type="text/javascript">

    var imageInput = $("#edititem_image");
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