<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'api/admin'], function()
{
    Route::post('login', 'App\Http\Controllers\API\Auth\AdminLoginController@login');
    Route::post('refresh', 'App\Http\Controllers\API\Auth\AdminLoginController@refresh');
}
);

Route::group(['prefix'=>'api/admin/products', 'middleware'=>'auth:admin-api'], function()
{
    Route::get('/', 'App\Http\Controllers\API\AdminController@index');
    Route::post('/', 'App\Http\Controllers\API\AdminController@store');
    Route::get('{product}', 'App\Http\Controllers\API\AdminController@show');
    Route::put('{product}', 'App\Http\Controllers\API\AdminController@update');
    Route::put('{product}', 'App\Http\Controllers\API\AdminController@update');
    Route::delete('{product}', 'App\Http\Controllers\API\AdminController@delete');
}
);
