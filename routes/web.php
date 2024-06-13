<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

Route::get('/', [TimelineController::class, 'timeline'])->name("/");
Route::get('/user', [TimelineController::class, 'user']);
Route::post('/post', [PostController::class, 'store']);
Route::post('/like', [LikeController::class, 'like'])->name("posts.like");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
