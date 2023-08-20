<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;

class CateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCreate()
    {
        $cate = Cate::select('id', 'name', 'parent_id')->get();
        return view('admin.module.category.add')->with([
            'title' => 'Thêm Chuyên Mục',
            'dataCate' => $cate
        ]);
    }
}