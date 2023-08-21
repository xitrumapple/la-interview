<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemEditRequest;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getCreate()
    {
        $cates = Cate::select("cate_name", "id")->get();
        return view('admin.module.item.add')->with([
            'title' => 'Add Item',
            'cates' => $cates
        ]);
    }

    public function postCreate(ItemRequest $request)
    {
        $item = new Item;
        $item->item_name = $request->txtItemName;
        $item->slug = Str::slug($request->txtItemName, '-');
        $item->unit = $request->sltUnit;
        $item->price = $request->txtPrice;
        $item->cate_id = $request->sltCate;
        $item->save();
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Added Item Success.']);

    }
    public function getIndex()
    {
        $items = Item::with('cates')->orderBy('id', 'desc')->get();
        return view('admin.module.item.list')->with([
            'title' => 'Manage Fruit Item',
            'listItem' => $items
        ]);
    }
    public function getDelete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Deleted Item Success.']);
    }
    public function getEdit($id)
    {
        $cates = Cate::select("cate_name", "id")->get();
        $item = Item::findOrFail($id);
        return view('admin.module.item.edit')->with([
            'title' => 'Edit Item',
            'cates' => $cates,
            'item' => $item,
        ]);
    }
    public function postEdit(ItemEditRequest $request, $id)
    {
        $item = Item::find($id);
        $item->item_name = $request->txtItemName;
        $item->slug = Str::slug($request->txtItemName, '-');
        $item->unit = $request->sltUnit;
        $item->price = $request->txtPrice;
        $item->cate_id = $request->sltCate;
        $item->save();
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Edited Item Success.']);
    }
    public function getItemByCate($id, $title)
    {
        $cate = Cate::find($id);
        if ($cate) {
            $items = $cate->items()->get();
            return view('admin.module.item.show')->with([
                'title' => 'Dashboard - Items',
                'listItem' => $items
            ]);
        } else {
            return redirect()->route('cate_index_get')->with(['flash_level' => 'alert alert-danger', 'flash_message' => 'The Category is not Exist']);
        }
    }
}