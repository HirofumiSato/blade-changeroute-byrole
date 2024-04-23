<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 一般ユーザーのホームページ
    return view('dashboard');
    })->middleware(['auth', 'verified', CheckIsAdminMiddleware::class])->name('dashboard');

Route::get('/admindashboard', function () {
    // 管理者のホームページ
    return view('admindashboard');
    })->middleware(['auth', 'verified'])->name('admindashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
