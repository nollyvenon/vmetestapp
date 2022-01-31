<?php

use App\Http\Livewire\AddProduct;
use App\Http\Livewire\Product;
use Illuminate\Support\Facades\Route;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
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

Route::get('/', Product::class)->name('home');
Route::get('/addProduct', AddProduct::class)->name('addProduct');
Route::post('/store-product', [AddProduct::class, 'store']);
Route::post('import', function(){
    Excel::import(new ProductsImport, request()->file('fileInput'), \Maatwebsite\Excel\Excel::CSV);
    return redirect()->back()->with('success','Data Imported Successfully');
});
Route::get('delete/{id}', [Product::class, 'delete']);