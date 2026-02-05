<?php

use Illuminate\Support\Facades\Route;
use Shop\Admin\Http\Controllers\AdminController;
use Shop\Admin\Http\Controllers\PermissionController;
use Shop\Admin\Http\Controllers\RoleController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role','index')->name('admin.role.index');
        Route::get('/role/create','create')->name('admin.role.create');
        Route::post('/role/store','store')->name('admin.role.store');
        Route::get('/role/{id}/edit','edit')->name('admin.role.edit');
        Route::put('/role/{id}/update','update')->name('admin.role.update');
        Route::delete('/role/{id}/delete','destroy')->name('admin.role.delete');

    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission','index')->name('admin.permission.index');
        Route::get('/permission/create','create')->name('admin.permission.create');
        Route::post('/permission/store','store')->name('admin.permission.store');
        Route::get('/permission/{id}/edit','edit')->name('admin.permission.edit');
        Route::put('/permission/{id}/update','update')->name('admin.permission.update');
        Route::delete('/permission/{id}/delete','destroy')->name('admin.permission.delete');

    });

});
