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

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'cn_admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

        Route::group(['prefix' => 'category'], function () {
            Route::get('create', ['as' => 'cate_create_get', 'uses' => 'CateController@getCreate']);
            Route::post('create', ['as' => 'cate_create_post', 'uses' => 'CateController@postCreate']);
            Route::get('list', ['as' => 'cate_index_get', 'uses' => 'CateController@getIndex']);
            Route::get('delete/{id}', ['as' => 'cate_delete_get', 'uses' => 'CateController@getDelete'])->where(['id' => '[0-9]+']);
            Route::get('edit/{id}', ['as' => 'cate_edit_get', 'uses' => 'CateController@getEdit'])->where(['id' => '[0-9]+']);
            Route::post('edit/{id}', ['as' => 'cate_edit_post', 'uses' => 'CateController@postEdit'])->where(['id' => '[0-9]+']);
        });








        // Route::get('cate/list', [
        //     'as' => 'cate_index_get',
        //     function () {
        //         return view('admin.module.category.list')->with('title', 'Manage Fruit Category');
        //     }
        // ]);
        Route::get('item/list', [
            'as' => 'item_index_get',
            function () {
                return view('admin.module.item.list')->with('title', 'Manage Fruit Item');
            }
        ]);

        Route::get('order/list', [
            'as' => 'order_index_get',
            function () {
                return view('admin.module.invoice.orderlist')->with('title', 'Manage Invoice');
            }
        ]);

        Route::get('item/dashboard', [
            'as' => 'item_get',
            function () {
                return view('admin.module.item.show')->with('title', 'Apple Category');
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