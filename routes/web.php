<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware'=>'guest:admin'], function()
{
    Route::get('login', 'App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
}
);

Route::group(['prefix'=>'admin/products', 'middleware'=>'auth:admin'], function()
{
    Route::get('/', 'App\Http\Controllers\Web\AdminController@index')->name('admin.all.products');
    Route::get('create', 'App\Http\Controllers\Web\AdminController@create')->name('admin.create.product');
    Route::post('/', 'App\Http\Controllers\Web\AdminController@store')->name('admin.store.product');
    Route::get('{product}', 'App\Http\Controllers\Web\AdminController@show')->name('admin.show.product');
    Route::get('{product}/edit', 'App\Http\Controllers\Web\AdminController@edit')->name('admin.edit.product');
    Route::put('{product}', 'App\Http\Controllers\Web\AdminController@update')->name('admin.update.product');
    Route::delete('{product}', 'App\Http\Controllers\Web\AdminController@delete')->name('admin.delete.product');
}
);

Route::group(['prefix'=>'user', 'middleware'=>'auth:web'], function()
{
    Route::get('products', 'App\Http\Controllers\Web\UserController@index')->name('user.all.products');
    Route::get('products/{product}', 'App\Http\Controllers\Web\UserController@show')->name('user.show.product');
    Route::get('cart', 'App\Http\Controllers\Web\UserController@showCart')->name('user.show.cart');
    Route::post('cart/{product}', 'App\Http\Controllers\Web\UserController@addToCart')->name('user.add.product');
    Route::delete('cart/{product}', 'App\Http\Controllers\Web\UserController@removeFromCart')->name('user.remove.product');
}
);

Route::group(['prefix'=>'shop', 'middleware'=>'guest'], function()
{
    Route::get('products', 'App\Http\Controllers\Web\GuestController@index')->name('guest.all.products');
    Route::get('products/{product}', 'App\Http\Controllers\Web\GuestController@show')->name('guest.show.product');
}
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
