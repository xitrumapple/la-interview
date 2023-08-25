<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'title' => 'Home Page',
        ]);
    }

    public function dashboard()
    {
        $cates = Cate::with('items')->get();
        return view('dashboard')->with([
            'title' => 'Dashboard - Categories',
            'listCate' => $cates
        ]);
    }
}