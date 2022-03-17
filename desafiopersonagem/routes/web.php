<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\PersonagensControlller;
use App\Http\Controllers\RacasController;
use App\Http\Controllers\TiposEquipamentosController;
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

require __DIR__ . '/auth.php';



Route::get('/personagens', [PersonagensControlller::class, 'index'])->name('personagens.index');
Route::get('/personagens/show/{id}', [PersonagensControlller::class, 'show'])
    ->middleware(['auth'])
    ->name('personagens.show');

Route::get('/personagens/create', [PersonagensControlller::class, 'create'])
    ->middleware(['auth'])
    ->name('personagens.create');

Route::post('/personagens/store', [PersonagensControlller::class, 'store'])
    ->middleware(['auth'])
    ->name('personagens.store');

Route::get('/personagens/{id}/edit', [PersonagensControlller::class, 'edit'])
    ->middleware(['auth'])
    ->name('personagens.edit');

Route::put('/personagens/{id}/update', [PersonagensControlller::class, 'update'])
    ->middleware(['auth'])
    ->name('personagens.update');

Route::get('/personagens/{id}/delete', [PersonagensControlller::class, 'destroy'])
    ->middleware(['auth'])
    ->name('personagens.destroy');


Route::prefix('/racas')->group(function () {
    Route::get('/', [RacasController::class, 'index'])->name('racas.index');
    Route::get('/create', [RacasController::class, 'create'])->name('racas.create');
    Route::post('/store', [RacasController::class, 'store'])->name('racas.store');
    Route::get('/store/show/{id}', [RacasController::class, 'show'])->name('racas.show');
    Route::get('/{id}/edit', [RacasController::class, 'edit'])->name('racas.edit');
    Route::put('/{id}/update', [RacasController::class, 'update'])->name('racas.update');
    Route::get('/{id}/delete', [RacasController::class, 'destroy'])->name('racas.destroy');
});




Route::prefix('/classes')->group(function () {
    Route::get('/', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('/store', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('/{id}/show', [ClassesController::class, 'show'])->name('classes.show');
    Route::get('/{id}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::put('/{id}/update', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/{id}/delete', [ClassesController::class, 'destroy'])->name('classes.destroy');
});


Route::prefix('/tipos-equipamentos')->group(function() {
    Route::get('/', [TiposEquipamentosController::class, 'index'])
        ->name('tiposequipamentos.index');

    Route::get('/create', [TiposEquipamentosController::class, 'create'])
        ->name('tiposequipamentos.create');

    Route::post('/store', [TiposEquipamentosController::class, 'store'])
        ->name('tiposequipamentos.store');

    Route::get('/{id}/show', [TiposEquipamentosController::class, 'show'])
        ->name('tiposequipamentos.show');

    Route::get('/{id}/edit', [TiposEquipamentosController::class, 'edit'])
        ->name('tiposequipamentos.edit');

    Route::put('/{id}/update', [TiposEquipamentosController::class, 'update'])
        ->name('tiposequipamentos.update');

    Route::get('/{id}/delete', [TiposEquipamentosController::class, 'destroy'])
        ->name('tiposequipamentos.destroy');
});

Route::prefix('/equipamentos')->group(function() {
    Route::get('/', [EquipamentosController::class, 'index'])
        ->name('equipamentos.index');

    Route::get('/create', [EquipamentosController::class, 'create'])
        ->name('equipamentos.create');

    Route::post('/store', [EquipamentosController::class, 'store'])
        ->name('equipamentos.store');

    Route::get('/{id}/show', [EquipamentosController::class, 'show'])
        ->name('equipamentos.show');

    Route::get('/{id}/edit', [EquipamentosController::class, 'edit'])
        ->name('equipamentos.edit');

    Route::put('/{id}/update', [EquipamentosController::class, 'update'])
        ->name('equipamentos.update');

    Route::get('/{id}/delete', [EquipamentosController::class, 'destroy'])
        ->name('equipamentos.destroy');
});
