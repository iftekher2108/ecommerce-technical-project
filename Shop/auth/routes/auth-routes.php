<?php

use Illuminate\Support\Facades\Route;
use Shop\Auth\Http\Controllers\AuthController;



Route::prefix('auth')->middleware(['web'])->controller(AuthController::class)->group(function () {
    Route::get('/login','login_form')->name('auth.login.form');
    Route::post('/login','login')->name('auth.login');
});

Route::prefix('auth')->middleware(['web','auth'])->controller(AuthController::class)->group(function () {
    Route::post('/logout','logout')->name('auth.logout');
});


// Route::get('/auths', [AuthController::class, 'index'])->name('auths.index');
// Route::get('/auths/create', [AuthController::class, 'create'])->name('auths.create');
// Route::post('/auths', [AuthController::class, 'store'])->name('auths.store');
// Route::get('/auths/{auth}', [AuthController::class, 'show'])->name('auths.show');
// Route::get('/auths/{auth}/edit', [AuthController::class, 'edit'])->name('auths.edit');
// Route::put('/auths/{auth}', [AuthController::class, 'update'])->name('auths.update');
// Route::delete('/auths/{auth}', [AuthController::class, 'destroy'])->name('auths.destroy');
