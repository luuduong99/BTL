<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//---------------------
Route::group(['prefix'=>'admin'],function()
{
    Route::get('login', [LoginController::class,'login'])->name('admin.login');
    Route::post('login', [LoginController::class,'check']);
    Route::get('logout', [LoginController::class,'logout'])->name('get.logout');
});


//-----------------
//admin
Route::group(['prefix'=>'admin'],function()
{
    Route::get('home', 'App\Http\Controllers\admin\HomeController@home')->name('admin.home');
    //users
    Route::resource('user', 'App\Http\Controllers\admin\UserController')->only('index');
    //create
    Route::get('user/create', 'App\Http\Controllers\admin\UserController@create')->name('user.create');
    Route::post('user/create', 'App\Http\Controllers\admin\UserController@store')->name('user.store');
    //update
    Route::get('user/update/{id}', 'App\Http\Controllers\admin\UserController@show')->name('user.show');
    Route::post('user/update/{id}', 'App\Http\Controllers\admin\UserController@edit')->name('user.edit');
    //delete
    Route::get('user/delete/{id}', 'App\Http\Controllers\admin\UserController@destroy')->name('user.destroy');
    //----------------------------------
    //categories
    Route::get('categories', 'App\Http\Controllers\admin\CategoriesController@index')->name('categories.index');
    //create
    Route::get('categories/create', 'App\Http\Controllers\admin\CategoriesController@create')->name('categories.create');
    Route::post('categories/create', 'App\Http\Controllers\admin\CategoriesController@store')->name('categories.store');
     //update
    Route::get('categories/update/{id}', 'App\Http\Controllers\admin\CategoriesController@show')->name('categories.show');
    Route::post('categories/update/{id}', 'App\Http\Controllers\admin\CategoriesController@edit')->name('categories.edit');
    //delete
    Route::get('categories/delete/{id}', 'App\Http\Controllers\admin\CategoriesController@destroy')->name('categories.destroy');
    //----------------------------------
    //products
    Route::get('products', 'App\Http\Controllers\admin\ProductsController@index')->name('products.index');
    //create
    Route::get('products/create', 'App\Http\Controllers\admin\ProductsController@create')->name('products.create');
    Route::post('products/create', 'App\Http\Controllers\admin\ProductsController@store')->name('products.store');
     //update
    Route::get('products/update/{id}', 'App\Http\Controllers\admin\ProductsController@show')->name('products.show');
    Route::post('products/update/{id}', 'App\Http\Controllers\admin\ProductsController@edit')->name('products.edit');
    //delete
    Route::get('products/delete/{id}', 'App\Http\Controllers\admin\ProductsController@destroy')->name('products.destroy');
    //----------------------------------------------
    //order
    Route::get('orders', 'App\Http\Controllers\admin\OrdersController@index')->name('orders.index');
    Route::get('order_detail/{id}', 'App\Http\Controllers\admin\OrdersController@orderDetail')->name('orders.detail');

    Route::get('orders/delivery/{id}', 'App\Http\Controllers\admin\OrdersController@delivery')->name('orders.delivery');
    Route::get('orders/delivery1/{id}', 'App\Http\Controllers\admin\OrdersController@delivery1')->name('orders.delivery1');
    //customer
    Route::get('customer', 'App\Http\Controllers\admin\HomeController@customer')->name('home.customer');
    //customer
    Route::get('rating', 'App\Http\Controllers\admin\HomeController@rating')->name('home.rating');
    //customer
    Route::get('comment', 'App\Http\Controllers\admin\HomeController@comment')->name('home.comment');

});
//--------------------------------
//frontend

Route::group(['prefix'=>'frontend'], function()
{
    Route::get('login', 'App\Http\Controllers\frontend\AccountController@login')->name('front.login');
    Route::post('login', 'App\Http\Controllers\frontend\AccountController@checkLogin')->name('front.checkLogin');
    Route::get('logout', 'App\Http\Controllers\frontend\AccountController@logout')->name('front.logout');
    Route::get('profile/{id}', 'App\Http\Controllers\frontend\AccountController@profile')->name('front.profile');
    Route::post('profile/{id}', 'App\Http\Controllers\frontend\AccountController@updateProfile')->name('front.updateProfile');
    Route::post('password/{id}', 'App\Http\Controllers\frontend\AccountController@updatePassword')->name('front.updatePassword');
    Route::get('quen_mat_khau', 'App\Http\Controllers\frontend\AccountController@forget')->name('front.forget');
    Route::post('recover-pass', 'App\Http\Controllers\frontend\AccountController@recover')->name('front.recover');
    Route::get('update-new-pass', 'App\Http\Controllers\frontend\AccountController@updateNewPass')->name('front.updateNewPass');
    Route::post('reset-new-pass', 'App\Http\Controllers\frontend\AccountController@resetNewPass')->name('front.resetNewPass');

});


Route::group(['prefix'=>'frontend'], function()
{
    Route::get('home', 'App\Http\Controllers\frontend\HomeController@index')->name('front.home');
    Route::get('categories/{id}', 'App\Http\Controllers\frontend\CategoryController@cate')->name('front.cate');
    Route::get('detail/{id}', 'App\Http\Controllers\frontend\ProductsController@detail')->name('front.detail');
    // Route::post('search', 'App\Http\Controllers\frontend\HomeController@autoCompleteAjax')->name('front.autoCompleteAjax');
    Route::get('name', 'App\Http\Controllers\frontend\HomeController@searchName')->name('front.searchName');

    //Route::get('search1', 'App\Http\Controllers\frontend\SearchController@search')->name('front.search');

    Route::get('resgister', 'App\Http\Controllers\frontend\AccountController@res')->name('front.res');
    Route::post('resgister', 'App\Http\Controllers\frontend\AccountController@resgister')->name('front.register');
    Route::get('actived/{customer}/{token}', 'App\Http\Controllers\frontend\AccountController@actived')->name('front.actived');
    Route::post('rating', 'App\Http\Controllers\frontend\RatingsController@rating')->name('front.rating');

    Route::post('comment/{id}', 'App\Http\Controllers\frontend\ProductsController@comment')->name('front.comment');
    Route::get('order', 'App\Http\Controllers\frontend\HomeController@order')->name('front.order');

    //cart
    Route::group(['prefix'=>'cart'], function()
    {
        Route::get('gio_hang', 'App\Http\Controllers\frontend\CartController@cart')->name('front.cart');
        Route::get('add/{id}', 'App\Http\Controllers\frontend\CartController@add')->name('front.addCart');
        Route::get('remove/{id}', 'App\Http\Controllers\frontend\CartController@remove')->name('front.removeCart');
        Route::get('update/{id}', 'App\Http\Controllers\frontend\CartController@update')->name('front.updateCart');
        Route::get('clear', 'App\Http\Controllers\frontend\CartController@clear')->name('front.clear');

    });
    //endcart

    //--------------------------------------------------------

    //checkout
        Route::group(['prefix'=>'checkout'], function()
    {
        Route::get('/', 'App\Http\Controllers\frontend\CheckoutController@formCheckout')->name('front.fromCheckout');
        Route::post('thanh_toan', 'App\Http\Controllers\frontend\CheckoutController@checkout')->name('front.checkout');
        //VNPAY
        Route::get('vnpay', 'App\Http\Controllers\frontend\CheckoutController@vnpay')->name('front.vnpay');
        Route::post('vnpay_payment', 'App\Http\Controllers\frontend\CheckoutController@vnpay_payment')->name('front.vnpay_payment');
        Route::get('vnpay_payment/return', 'App\Http\Controllers\frontend\CheckoutController@vnpayReturn')->name('front.vnpayReturn');
        //MOMO
        Route::post('momo_payment', 'App\Http\Controllers\frontend\CheckoutController@momo_payment')->name('front.momo_payment');
        Route::post('paymomo', 'App\Http\Controllers\frontend\CheckoutController@paymomo')->name('front.paymomo');

    });
    //end checkout
});

