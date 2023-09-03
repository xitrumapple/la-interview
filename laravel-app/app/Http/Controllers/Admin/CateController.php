<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Http\Requests\CateRequest;
use App\Http\Requests\CateEditRequest;
use Illuminate\Support\Str;
use File;

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
        //Process upload Image
        $path = $request->file('image')->store('cates', ['disk' => 'my_files']);
        $cate->image = $path;

        $cate->slug = Str::slug($request->txtCateName, '-');
        $cate->description = $request->txtDescription;
        //$cate->created_at = new DateTime();
        $cate->save();
        return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Category successfully added']);

    }
    public function getIndex()
    {
        $cates = Cate::orderBy('id', 'desc')->paginate(6);
        return view('admin.module.category.list')->with([
            'title' => 'Manage Fruit Category',
            'listCate' => $cates
        ]);
    }
    public function getDelete($id)
    {
        $cates = Cate::findOrFail($id);
        $filename = public_path('uploads/') . $cates->image;
        if (File::exists($filename)) {
            File::delete($filename);
        }
        $cates->delete();
        return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Category successfully deleted']);
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
        $cateCheck = Cate::where('cate_name', $request->txtCateName)->whereNotIn('id', [$request->id])->first();

        if ($cateCheck == null) {
            $cate = Cate::findOrFail($id);

            //Process Image
            if ($request->image != '') {

                // Delete Old image Before Uploading new image
                $filename = public_path('uploads/') . $cate->image;
                if (File::exists($filename)) {
                    File::delete($filename);
                }

                //upload new Image
                $path = $request->file('image')->store('cates', ['disk' => 'my_files']);

                $cate->update([
                    'cate_name' => $request->txtCateName,
                    'slug' => Str::slug($request->txtCateName, '-'),
                    'description' => $request->txtDescription,
                    'image' => $path
                ]);

            } else {
                $cate->update([
                    'cate_name' => $request->txtCateName,
                    'slug' => Str::slug($request->txtCateName, '-'),
                    'description' => $request->txtDescription
                ]);
            }

            return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Category successfully edited.']);
        } else {
            return redirect()->back()->with(['flash_level' => 'alert alert-danger', 'flash_message' => 'Category Name has already exists.']);
        }

    }
}