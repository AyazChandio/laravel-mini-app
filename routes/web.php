<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogPostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blogs', [BlogPostController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{id}', [BlogPostController::class, 'show'])->name('blog.show');
    Route::get('/blogs/{id}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{id}', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{id}', [BlogPostController::class, 'destroy'])->name('blog.destroy');

});

require __DIR__.'/auth.php';
