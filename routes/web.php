<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashborad;
use App\Http\Controllers\handelForm;
use App\Http\Controllers\profile;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'store']);

Route::get('/', [dashborad::class, 'index'])->name('dashboard');
Route::get('/profile', [profile::class, 'index'])->name('profile');

Route::post('/ideas', [handelForm::class, 'store'])->name('idea.store');

Route::get('/register', [AuthController::class, 'index'])->name('register');

Route::get('/ideas/{idea}', [handelForm::class, 'show'])->name('idea.show');

Route::put('/ideas/{idea}', [handelForm::class, 'update'])->name('idea.update');

Route::get('/ideas/{idea}/edit', [handelForm::class, 'edit'])->name('idea.edit');

Route::delete('/ideas/{id}', [handelForm::class, 'destroy'])->name('idea.destroy');

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
