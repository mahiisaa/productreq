<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes a                                                         re loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
});
Route::prefix('/admin')->namespace("App\Http\Controllers")->group(function(){
    Route::get('/product/create',"ProductController@create")->name('createProduct');
    Route::post('/product/create',"ProductController@store")->name('storeProduct');
    Route::get('/homepage',"HomeController@show");
});
Route::get('/cart',"App\Http\Controllers\ProductController@cart");
Route::post('/homepage',"App\Http\Controllers\HomeController@show");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/home', [App\Http\Controllers\HomeController::class, 'submitReq']);
