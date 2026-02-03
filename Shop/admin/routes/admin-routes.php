<?php

use Illuminate\Support\Facades\Route;
use Shop\Admin\Http\Controllers\AdminController;
use Shop\Admin\Http\Controllers\RoleController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role','index')->name('admin.role.index');
        Route::get('/role/create','create')->name('admin.role.create');
        Route::get('/role/{id}/edit','edit')->name('admin.role.edit');
        Route::get('/role/{id}/delete','delete')->name('admin.role.delete');


    });

});
