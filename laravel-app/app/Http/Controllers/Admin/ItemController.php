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
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Item successfully added.']);

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
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Item successfully deleted.']);
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
        return redirect()->route('item_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Item successfully Edited.']);
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

    public function getAllItem()
    {
        $items = Item::all();
        return view('admin.module.item.show')->with([
            'title' => 'Dashboard - Items',
            'listItem' => $items
        ]);
    }

    // public function getItemCart()
    // {
    //     return view('admin.module.item.viewcart')->with([
    //         'title' => 'View Cart'
    //     ]);
    // }
    public function addItemtoCart($id)
    {
        $item = Item::with('cates')->find($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && array_key_exists($item->id, $cart)) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "cate_name" => $item->cates->cate_name,
                "item_name" => $item->item_name,
                "unit" => $item->unit,
                "price" => $item->price,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Item has been added to cart!']);
    }

    public function removeItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item successfully deleted.');
        }
    }

    public function emptyCart(Request $request)
    {
        if ($request->_token) {
            session()->forget('cart');
            session()->flash('success', 'Empty Cart Successfully.');
        }
    }

    public function updateItemQuantity(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Item updated successfully');
        }
    }

    // public function updateCart(Request $request)
    // {
    //     $data = $request->quantity;
    //     $cart = session()->get('cart');
    //     foreach ($data as $k => $sl) {
    //         $cart[$k]['quantity'] = $sl;
    //     }
    //     session()->put('cart', $cart);
    //     session()->flash('success', 'Update Cart Successfully');
    //     return view('admin.module.item.viewcart')->with('title', 'View Cart');
    // }

}