<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard and Profile Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');

// // Idea Routes
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::post('/ideas', [IdeaController::class, 'store'])->name('idea.store');
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');

// Comment Routes
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store')->middleware('auth');
