<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product', [ProductController::class, 'index'])->name('products.index');
    Route::get('/dashboard', [ProductController::class, 'view'])->name('dashboard');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/cancel', [ProductController::class, 'cancel'])->name('product.cancel');
    Route::post('/product', [ProductController::class, 'store']) ->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/video/add', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/video/store', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/video/tutorials', [VideoController::class, 'index'])->name('videos.index');

});
