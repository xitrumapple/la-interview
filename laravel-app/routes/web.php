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

//Dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'cn_admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

        //Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('create', ['as' => 'cate_create_get', 'uses' => 'CateController@getCreate']);
            Route::post('create', ['as' => 'cate_create_post', 'uses' => 'CateController@postCreate']);
            Route::get('list', ['as' => 'cate_index_get', 'uses' => 'CateController@getIndex']);
            Route::get('delete/{id}', ['as' => 'cate_delete_get', 'uses' => 'CateController@getDelete'])->where(['id' => '[0-9]+']);
            Route::get('edit/{id}', ['as' => 'cate_edit_get', 'uses' => 'CateController@getEdit'])->where(['id' => '[0-9]+']);
            Route::post('edit/{id}', ['as' => 'cate_edit_post', 'uses' => 'CateController@postEdit'])->where(['id' => '[0-9]+']);
        });

        //Item
        Route::group(['prefix' => 'item'], function () {
            Route::get('create', ['as' => 'item_create_get', 'uses' => 'ItemController@getCreate']);
            Route::post('create', ['as' => 'item_create_post', 'uses' => 'ItemController@postCreate']);
            Route::get('list', ['as' => 'item_index_get', 'uses' => 'ItemController@getIndex']);
            Route::get('delete/{id}', ['as' => 'item_delete_get', 'uses' => 'ItemController@getDelete'])->where(['id' => '[0-9]+']);
            Route::get('edit/{id}', ['as' => 'item_edit_get', 'uses' => 'ItemController@getEdit'])->where(['id' => '[0-9]+']);
            Route::post('edit/{id}', ['as' => 'item_edit_post', 'uses' => 'ItemController@postEdit'])->where(['id' => '[0-9]+']);
            Route::get('show/{id}/{title}', ['as' => 'cate_item_get', 'uses' => 'ItemController@getItemByCate'])->where(['id' => '[0-9]+', 'title' => '[a-zA-Z0-9._\-]+']);
            Route::get('show/buy-more', ['as' => 'all_item_get', 'uses' => 'ItemController@getAllItem']);
            Route::post('update-cart', ['as' => 'update.cart', 'uses' => 'ItemController@updateCart']); //not complete yet do it later

            //Add item to cart
            Route::get('{id}', [App\Http\Controllers\Admin\ItemController::class, 'addItemtoCart'])->name('additem.to.cart');
            //Route::get('viewcart', [App\Http\Controllers\Admin\ItemController::class, 'getItemCart'])->name('view.cart');
            Route::delete('/remove-cart-item', [App\Http\Controllers\Admin\ItemController::class, 'removeItem'])->name('remove.cart.item');
            Route::delete('/empty-cart', [App\Http\Controllers\Admin\ItemController::class, 'emptyCart'])->name('empty.cart');
            Route::patch('/update-quantity-item', [App\Http\Controllers\Admin\ItemController::class, 'updateItemQuantity'])->name('update.quantity.item');
        });

        //Invoice
        Route::group(['prefix' => 'invoice'], function () {
            Route::post('create', ['as' => 'invoice_create_post', 'uses' => 'InvoiceController@postCreate']);
            Route::get('list', ['as' => 'invoice_index_get', 'uses' => 'InvoiceController@getIndex']);
            Route::get('edit/{id}', ['as' => 'invoice_edit_get', 'uses' => 'InvoiceController@getEdit'])->where(['id' => '[0-9]+']);
            Route::post('edit/{id}', ['as' => 'invoice_edit_post', 'uses' => 'InvoiceController@postEdit'])->where(['id' => '[0-9]+']);

            //Process Edit Invoice Before Saving to DB
            Route::delete('/remove-cart-item', [App\Http\Controllers\Admin\InvoiceController::class, 'removeItem'])->name('remove.cart.item');
            Route::patch('/update-quantity-item', [App\Http\Controllers\Admin\InvoiceController::class, 'updateItemQuantity'])->name('update.quantity.item');
        });

        Route::get('viewcart', [
            'as' => 'view.cart',
            function () {
                return view('admin.module.item.viewcart')->with('title', 'View Invoice');
            }
        ]);

        // Route::get('cate/list', [
        //     'as' => 'cate_index_get',
        //     function () {
        //         return view('admin.module.category.list')->with('title', 'Manage Fruit Category');
        //     }
        // ]);
        // Route::get('item/list', [
        //     'as' => 'item_index_get',
        //     function () {
        //         return view('admin.module.item.list')->with('title', 'Manage Fruit Item');
        //     }
        // ]);
        // Route::get('item/dashboard', [
        //     'as' => 'item_get',
        //     function () {
        //         return view('admin.module.item.show')->with('title', 'Apple Category');
        //     }
        // ]);

        // Route::get('order/list', [
        //     'as' => 'order_index_get',
        //     function () {
        //         return view('admin.module.invoice.orderlist')->with('title', 'Manage Invoice');
        //     }
        // ]);

    });

});