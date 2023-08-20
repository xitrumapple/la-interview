@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="row justify-content-center">
                    <div class="col-sm-2 m-2 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Vietnam small apple</h5>
                                <p class="card-text">₹100 / 1 Kg</p>
                                <a href="{{route('item_index_get')}}" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Vietnam big apple</h5>
                                <p class="card-text">₹100 / 1 Kg</p>
                                <a href="#" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">China small apple</h5>
                                <p class="card-text">₹100 / 1 Kg</p>
                                <a href="#" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Austria apple</h5>
                                <p class="card-text">₹100 / 1 Kg</p>
                                <a href="#" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 m-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Canada Apple</h5>
                                <p class="card-text">₹100 / 1 Kg</p>
                                <a href="#" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection