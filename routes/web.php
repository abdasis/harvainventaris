<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('barang', 'BarangController');
    Route::resource('kategori-barang', 'CategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('suppliers', 'SupplierController');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
