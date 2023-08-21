<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Http\Requests\CateRequest;
use App\Http\Requests\CateEditRequest;
use Illuminate\Support\Str;


class CateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getCreate()
    {
        return view('admin.module.category.add')->with([
            'title' => 'Add Category'
        ]);
    }
    public function postCreate(CateRequest $request)
    {
        $cate = new Cate;
        $cate->cate_name = $request->txtCateName;
        $cate->slug = Str::slug($request->txtCateName, '-');
        $cate->description = $request->txtDescription;
        //$cate->created_at = new DateTime();
        $cate->save();
        return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Added Category Success.']);

    }
    public function getIndex()
    {
        $cates = Cate::all();
        return view('admin.module.category.list')->with([
            'title' => 'Manage Fruit Category',
            'listCate' => $cates
        ]);
    }
    public function getDelete($id)
    {
        $cates = Cate::findOrFail($id);
        $cates->delete();
        return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Deleted Success.']);
    }
    public function getEdit($id)
    {
        $cate = Cate::findOrFail($id);
        return view('admin.module.category.edit')->with([
            'title' => 'Edit Category',
            'cate' => $cate,
        ]);
    }
    public function postEdit(CateEditRequest $request, $id)
    {
        $cate = Cate::find($id);
        $cate->cate_name = $request->txtCateName;
        $cate->slug = Str::slug($request->txtCateName, '-');
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Edited Category Success.']);
    }
}