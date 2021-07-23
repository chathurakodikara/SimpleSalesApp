<?php

use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


// going to use login view
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');






Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('/purchase-orders', App\Http\Livewire\PurchaseOrder\Index::class)->name('purchase-orders.index');
});

Route::group(['middleware' => ['can:distributor']], function () {
    Route::get('/purchase-orders/create', App\Http\Livewire\PurchaseOrder\Create::class)->name('purchase-orders.create');
    Route::get('/purchase-orders/{po}', App\Http\Livewire\PurchaseOrder\Create::class)->name('purchase-orders.edit');
});

Route::group(['middleware' => ['can:admin']], function () {
    // Route::resource('products', ProductController::class);
    Route::get('/products', App\Http\Livewire\Product\Index::class)->name('products');
    Route::get('/zones', App\Http\Livewire\Zone\Index::class)->name('zones');
    Route::get('/regions', App\Http\Livewire\Region\Index::class)->name('regions');
    Route::get('/territories', App\Http\Livewire\Territory\Index::class)->name('territories');
    Route::get('/users', App\Http\Livewire\User\Index::class)->name('users');
});
















Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
