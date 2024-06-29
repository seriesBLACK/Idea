<?php

use App\Http\Controllers\dashborad;
use App\Http\Controllers\handelForm;
use Illuminate\Support\Facades\Route;

Route::get('/', [dashborad::class, 'index'])->name('dashboard');
Route::post('/idea', [handelForm::class, 'store'])->name('idea.store');
Route::delete('/idea/{id}', [handelForm::class, 'destroy'])->name('idea.destroy');
