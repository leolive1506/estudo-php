<?php

// importação de uma class
// mesma coisa de um import no react
// import Route from facedes

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiteController;
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

/*
Criar rota laragon
    Route::get("/path", [nomeDoController::class, nomeDoMetodo])
    Route::put("/path", [nomeDoController::class, nomeDoMetodo])
    Route::post("/path", [nomeDoController::class, nomeDoMetodo])
    Route::destroy("/path", [nomeDoController::class, nomeDoMetodo])


    Resumo
    Route::tipo("/path/{nome_do_parametro}", [nomeDoController::class, nomeDoMetodo])
        * Destroy -> delete


*/

/*
     criar uma rota para mostrar a página inicial
     precisa controller (app/Http/controllers)
     se não existir, criar
     criar controllers
        php artisan make:controller NomeDoControllerController
            tem que ter Controller no final e letra maiuscula no começo da palavra
 */
//                   controller                    função
Route::get("/", [SiteController::class, 'index']);


//
Route::get("/sobre", [SiteController::class, 'sobre'])->name('site.sobre');
// name('site.sobre'); -> named route
// é um nome pra rota

Route::get("/posts", [PostsController::class, 'index'])->name('posts.index');

Route::get("/posts/novo", [PostsController::class, 'create'])->name('posts.create');

Route::post("/posts", [PostsController::class, 'store'])->name('posts.store');

// Controler/idBuscado
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');