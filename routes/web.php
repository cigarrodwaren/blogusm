<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome.index');

Route::get('/', [WelcomeController::class,'index'])->name('welcome.index');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class,'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
    Route::get('/posts', [PostController::class,'create'])->name('posts.create');
    Route::post('/posts', [PostController::class,'store'])->name('posts.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
