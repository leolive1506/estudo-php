<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get("/clientes", [ClientesController::class, 'index'])->name('clientes.index');

Route::get("/clientes/novo", [ClientesController::class, 'create'])->name('clientes.create');

Route::post('/clientes', [ClientesController::class, 'store'])->name("clientes.store");

Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit'])->name("clientes.edit");

Route::put('/clientes/{id}', [ClientesController::class, 'update'])->name("clientes.update");

Route::delete('clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');