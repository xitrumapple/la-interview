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
        });








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

        Route::get('order/list', [
            'as' => 'order_index_get',
            function () {
                return view('admin.module.invoice.orderlist')->with('title', 'Manage Invoice');
            }
        ]);



        Route::get('viewcart', [
            'as' => 'viewcart_get',
            function () {
                return view('admin.module.invoice.viewcart')->with('title', 'View Cart');
            }
        ]);
    });

});