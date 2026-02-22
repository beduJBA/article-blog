<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/create', [\App\Http\Controllers\ArticleController::class, 'create'])
    ->middleware('auth')
    ->name('articles.create');

Route::post('/articles', [\App\Http\Controllers\ArticleController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');

Route::get('/articles/{slug}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])
    ->middleware('auth')
    ->name('articles.edit');

Route::put('/articles/{slug}', [\App\Http\Controllers\ArticleController::class, 'update'])
    ->middleware('auth')
    ->name('articles.update');

Route::delete('/articles/{slug}', [\App\Http\Controllers\ArticleController::class, 'destroy'])
    ->middleware('auth')
    ->name('articles.destroy');

Route::get('/articles/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])
    ->name('articles.show');


require __DIR__.'/auth.php';
