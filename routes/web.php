<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Agrupando Rotas
Route::prefix('/post')->group(function () {
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/novo-post', [PostController::class, 'create'])->name('posts.create');
});

Route::prefix('/posts')->group(function () {
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');
    // Route::get('/novo-post', [PostController::class, 'create'])->name('posts.create'); -- Não funcionou
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
});


Route::get('/', function () {
    return view('welcome');
});
