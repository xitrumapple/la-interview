<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Invoice;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $invoices = Invoice::with('items')->orderBy('id', 'desc')->get()->toArray();
        return view('admin.module.invoice.orderlist')->with([
            'title' => 'Manage Invoice',
            'listInvoice' => $invoices
        ]);
    }

    public function postCreate(Request $request)
    {
        $invoiceInsert = Invoice::create([
            'customer_name' => $request->txtCustomerName,
            'slug' => Str::slug($request->txtCustomerName, '-'),
        ]);

        $invoiceID = $invoiceInsert->id;

        $invoice = Invoice::findOrFail($invoiceID);

        $cart = session()->get('cart');
        foreach ($cart as $item_id => $arr) {
            $pivot[$item_id] = [
                'quantity' => $arr['quantity'],
                'price' => $arr['price']
            ];
        }

        $invoice->items()->attach($pivot);
        session()->forget('cart');

        return redirect()->route('invoice_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Invoice successfully added.']);
    }

    // public function getEdit_bk($id)
    // {
    //     $invoice = Invoice::findOrFail($id);
    //     $items = $invoice->items()->with('cates')->get();
    //     return view('admin.module.invoice.edit')->with([
    //         'title' => 'Edit Invoice',
    //         'items' => $items,
    //         'customer_name' => $invoice->customer_name
    //     ]);
    // }

    public function getEdit($id)
    {
        session()->forget('editInvoice');
        $invoice = Invoice::findOrFail($id);
        $items = $invoice->items()->with('cates')->get();

        $editInvoice = session()->get('editInvoice', []);

        foreach ($items as $item) {
            $editInvoice[$item->id] = [
                "cate_name" => $item->cates->cate_name,
                "item_name" => $item->item_name,
                "unit" => $item->unit,
                "price" => $item->pivot->price,
                "quantity" => $item->pivot->quantity
            ];
        }
        session()->put('editInvoice', $editInvoice);

        return view('admin.module.invoice.edit')->with([
            'title' => 'Edit Invoice',
            'customer_name' => $invoice->customer_name
        ]);
    }

    public function removeItem(Request $request)
    {
        if ($request->id) {
            $editInvoice = session()->get('editInvoice');
            if (isset($editInvoice[$request->id])) {
                unset($editInvoice[$request->id]);
                session()->put('editInvoice', $editInvoice);
            }
            if (count((array) session('editInvoice')) == 0) {
                return response()->json(['error' => 'This invoice must contain at least one item']);
            } else {
                return 'OK';
            }
        } else {
            return response()->json(['error' => 'This item is not exists']);
        }
    }

    public function updateItemQuantity(Request $request)
    {
        if ($request->id && $request->quantity) {
            $editInvoice = session()->get('editInvoice');
            $editInvoice[$request->id]["quantity"] = $request->quantity;
            session()->put('editInvoice', $editInvoice);
            //session()->flash('success', 'Item Invoice Quantity updated successfully');
            return 'OK';
        } else {
            return response()->json(['error' => 'This item is not exists']);
        }
    }

    public function postEdit(Request $request)
    {
        Invoice::where('id', $request->id)->update([
            'customer_name' => $request->txtCustomerName,
            'slug' => Str::slug($request->txtCustomerName, '-'),
        ]);

        $invoice = Invoice::findOrFail($request->id);

        $editInvoice = session()->get('editInvoice');
        foreach ($editInvoice as $item_id => $arr) {
            $pivot[$item_id] = [
                'quantity' => $arr['quantity'],
                'price' => $arr['price']
            ];
        }

        $invoice->items()->sync($pivot);
        session()->forget('editInvoice');

        return redirect()->route('invoice_index_get')->with(['flash_level' => 'alert alert-success', 'flash_message' => 'Invoice successfully Updated.']);
    }
}