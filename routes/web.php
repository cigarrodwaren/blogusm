<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');

    Route::get('account', [AccountController::class,'index'])->name('account.index');
    Route::delete('account/{account}', [AccountController::class, 'destroy'])->name('account.destroy');

    Route::get('tags', [TagController::class, 'index'])->name('tags');
    Route::get('tags/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('tags/store', [TagController::class, 'store'])->name('tag.store');
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

    Route::get('category', [CategoryController::class,'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class,'store'])->name('category.store');
    Route::delete('category/{category}', [CategoryController::class,'destroy'])->name('category.destroy');

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/user/{user}', [PostController::class, 'listByUser'])->name('posts.listByUser');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
