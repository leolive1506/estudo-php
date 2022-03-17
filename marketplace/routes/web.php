<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoresController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function() {
    Route::prefix('stores')->group(function() {
        Route::get('/', [StoresController::class, 'index'])->name('stores.index');
        Route::get('/create', [StoresController::class, 'create'])->name('stores.create');
        Route::post('/store', [StoresController::class, 'store'])->name('stores.store');
        Route::get('/{id}/edit', [StoresController::class, 'edit'])->name('stores.edit');
        Route::put('/update/{id}', [StoresController::class, 'update'])->name('stores.update');

        Route::get('/destroy/{id}', [StoresController::class, 'destroy'])->name('stores.destroy');
    });

    Route::resource('products', ProductController::class);
});

