<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class,'index'])->name('welcome.index');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('tags', [TagController::class,'index'])->name('tags');
    Route::get('tags/create', [TagController::class,'create'])->name('tag.create');
    Route::post('tags/store', [TagController::class,'store'])->name('tagstore');
    Route::delete('tags/{tag}', [TagController::class,'destroy'])->name('tag.destroy');

    Route::get('posts', [PostController::class,'index'])->name('posts');
    Route::get('posts/{user}', [PostController::class,'list'])->name('list');
    Route::get('posts/create', [PostController::class,'create'])->name('create');
    Route::post('posts/store', [PostController::class,'store'])->name('store');
    Route::get('posts/{post}', [PostController::class,'show'])->name('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
