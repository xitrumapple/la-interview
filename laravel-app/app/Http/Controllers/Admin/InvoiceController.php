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
}