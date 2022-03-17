<?php

use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\TarefasController;
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

Route::get('/dashboard', [function () {
    return view('dashboard');
}])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::prefix('/tarefas')->group(function () {
    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index'); // listagem de tarefas
    Route::get('add', [TarefasController::class, 'create'])->name('tarefas.create')->middleware(['auth']); // tela de adição
    Route::post('add', [TarefasController::class, 'store'])->name('tarefas.store'); // ação de adição

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit')->middleware(['auth']); // tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'update'])->name('tarefas.update'); // ação de editar

    Route::get('delete/{id}', [TarefasController::class, 'destroy'])->name('tarefas.destroy'); // ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // marcar como resolvido / nao resolvido
});

Route::prefix('/config')->group(function () {
    // pegand o config inicial
    Route::get('/', [ConfigController::class, 'index'])->name('config.index');
    Route::post('/', [ConfigController::class, 'store'])->name('config.index');

    Route::get('/info', [ConfigController::class, 'info'])->name('config.info');

    Route::get('/permissoes', [ConfigController::class, 'permissoes'])->name('config.permissoes');;
});