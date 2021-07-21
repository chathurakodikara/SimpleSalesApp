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

Route::get('/products', App\Http\Livewire\Product\Index::class)->name('products');
Route::get('/zones', App\Http\Livewire\Zone\Index::class)->name('zones');
Route::get('/regions', App\Http\Livewire\Region\Index::class)->name('regions');
Route::get('/territories', App\Http\Livewire\Territory\Index::class)->name('territories');








Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
