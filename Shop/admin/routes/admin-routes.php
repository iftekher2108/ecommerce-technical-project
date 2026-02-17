<?php

use Illuminate\Support\Facades\Route;
use Shop\Admin\Http\Controllers\AdminController;
use Shop\Admin\Http\Controllers\PermissionController;
use Shop\Admin\Http\Controllers\RoleController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    // admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');

        // user management
        Route::get('/admin', 'index')->name('admin.admin.index')->middleware('permission:admin-index');
        Route::get('/admin/create', 'create')->name('admin.admin.create')->middleware('permission:admin-create');
        Route::post('/admin/store', 'store')->name('admin.admin.store')->middleware('permission:admin-store');
        Route::get('/admin/{id}/edit', 'edit')->name('admin.admin.edit')->middleware('permission:admin-edit');
        Route::put('/admin/{id}/update', 'update')->name('admin.admin.update')->middleware('permission:admin-update');
        Route::delete('/admin/{id}/delete', 'destroy')->name('admin.admin.delete')->middleware('permission:admin-delete');
    });

    // role management
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index')->name('admin.role.index')->middleware('permission:role-index');
        Route::get('/role/create', 'create')->name('admin.role.create')->middleware('permission:role-create');
        Route::post('/role/store', 'store')->name('admin.role.store')->middleware('permission:role-store');
        Route::get('/role/{id}/edit', 'edit')->name('admin.role.edit')->middleware('permission:role-edit');
        Route::put('/role/{id}/update', 'update')->name('admin.role.update')->middleware('permission:role-update');
        Route::delete('/role/{id}/delete', 'destroy')->name('admin.role.delete')->middleware('permission:role-delete');
    });

    // permission management
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'index')->name('admin.permission.index')->middleware('permission:permission-index');
        Route::get('/permission/create', 'create')->name('admin.permission.create')->middleware('permission:permission-create');
        Route::post('/permission/store', 'store')->name('admin.permission.store')->middleware('permission:permission-store');
        Route::get('/permission/{id}/edit', 'edit')->name('admin.permission.edit')->middleware('permission:permission-edit');
        Route::put('/permission/{id}/update', 'update')->name('admin.permission.update')->middleware('permission:permission-update');
        Route::delete('/permission/{id}/delete', 'destroy')->name('admin.permission.delete')->middleware('permission:permission-delete');
    });
});
