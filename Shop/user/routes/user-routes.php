<?php

use Illuminate\Support\Facades\Route;
use Shop\User\Http\Controllers\UserController;
use Shop\User\Http\Controllers\UserPermissionController;
use Shop\User\Http\Controllers\UserRoleController;

Route::prefix('admin')->middleware(['web','auth:admin'])->group(function() {

   // user
    Route::controller(UserController::class)->group(function () {

        // user management
        Route::get('/user', 'index')->name('admin.user.index')->middleware('permission:user-index');
        Route::get('/user/create', 'create')->name('admin.user.create')->middleware('permission:user-create');
        Route::post('/user/store', 'store')->name('admin.user.store')->middleware('permission:user-store');
        Route::get('/user/{id}/edit', 'edit')->name('admin.user.edit')->middleware('permission:user-edit');
        Route::put('/user/{id}/update', 'update')->name('admin.user.update')->middleware('permission:user-update');
        Route::delete('/user/{id}/delete', 'destroy')->name('admin.user.delete')->middleware('permission:user-delete');
    });

        // role management
    Route::controller(UserRoleController::class)->group(function () {
        Route::get('/user-role', 'index')->name('admin.user-role.index')->middleware('permission:user-role-index');
        Route::get('/user-role/create', 'create')->name('admin.user-role.create')->middleware('permission:user-role-create');
        Route::post('/user-role/store', 'store')->name('admin.user-role.store')->middleware('permission:user-role-store');
        Route::get('/user-role/{id}/edit', 'edit')->name('admin.user-role.edit')->middleware('permission:user-role-edit');
        Route::put('/user-role/{id}/update', 'update')->name('admin.user-role.update')->middleware('permission:user-role-update');
        Route::delete('/user-role/{id}/delete', 'destroy')->name('admin.user-role.delete')->middleware('permission:user-role-delete');
    });

    // permission management
    Route::controller(UserPermissionController::class)->group(function () {
        Route::get('/user-permission', 'index')->name('admin.user-permission.index')->middleware('permission:user-permission-index');
        Route::get('/user-permission/create', 'create')->name('admin.user-permission.create')->middleware('permission:user-permission-create');
        Route::post('/permission/store', 'store')->name('admin.user-permission.store')->middleware('permission:user-permission-store');
        Route::get('/user-permission/{id}/edit', 'edit')->name('admin.user-permission.edit')->middleware('permission:user-permission-edit');
        Route::put('/user-permission/{id}/update', 'update')->name('admin.user-permission.update')->middleware('permission:user-permission-update');
        Route::delete('/user-permission/{id}/delete', 'destroy')->name('admin.user-permission.delete')->middleware('permission:user-permission-delete');
    });


});