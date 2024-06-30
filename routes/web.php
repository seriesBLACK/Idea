<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashborad;
use App\Http\Controllers\handelForm;
use Illuminate\Support\Facades\Route;


Route::get('/', [dashborad::class, 'index'])->name('dashboard');

Route::post('/ideas', [handelForm::class, 'store'])->name('idea.store');

Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/ideas/{idea}', [handelForm::class, 'show'])->name('idea.show');

Route::put('/ideas/{idea}', [handelForm::class, 'update'])->name('idea.update');

Route::get('/ideas/{idea}/edit', [handelForm::class, 'edit'])->name('idea.edit');

Route::delete('/ideas/{id}', [handelForm::class, 'destroy'])->name('idea.destroy');

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');
