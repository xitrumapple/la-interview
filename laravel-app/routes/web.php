<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('admin', function () {
//     echo 'WELCOME INTERVIEW PROJECT';
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cate/list', ['as'=>'cate_index_get', function(){
    return view('listcate')->with('title','Manage Fruit Category');
}]);

Route::get('item/list', ['as'=>'item_index_get', function(){
    return view('listitem')->with('title','Manage Fruit Item');
}]);

Route::get('order/list', ['as'=>'order_index_get', function(){
    return view('orderlist')->with('title','Manage Invoice');
}]);

Route::get('item/dashboard', ['as'=>'item_get', function(){
    return view('item')->with('title','Apple Category');
}]);

Route::get('viewcart', ['as'=>'viewcart_get', function(){
    return view('viewcart')->with('title','View Cart');
}]);