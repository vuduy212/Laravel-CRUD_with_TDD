<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create')
    ->middleware('auth');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store')
    ->middleware('auth');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.delete')
    ->middleware('auth');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit')
    ->middleware('auth');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update')
    ->middleware('auth');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');


