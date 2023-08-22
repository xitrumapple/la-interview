<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('admin.module.invoice.orderlist')->with([
            'title' => 'Manage Invoice'
        ]);
    }

    public function postCreate()
    {

        return view('admin.module.invoice.orderlist')->with([
            'title' => 'Create Invoice'
        ]);
    }
}