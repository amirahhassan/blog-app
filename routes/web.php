<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/post', function () {
//     return Inertia::render('Post');
// })->middleware(['auth', 'verified'])->name('post');

Route::get('/posts/index', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('posts.show');

Route::get('user/posts', [PostController::class, 'userPosts'])
    ->middleware(['auth', 'verified'])
    ->name('posts.userPosts');

Route::get('user/edit/{id}', [PostController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('posts.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
