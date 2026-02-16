<?php

use Illuminate\Support\Facades\Route;
use Shop\Setting\Http\Controllers\SettingController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(SettingController::class)->group(function () {
        // setting management
        Route::get('/setting', 'index')->name('admin.setting.index')->middleware('permission:setting-index');
        Route::get('/setting/create', 'create')->name('admin.setting.create')->middleware('permission:setting-create');
        Route::post('/setting/store', 'store')->name('admin.setting.store')->middleware('permission:setting-store');
        Route::get('/setting/{id}/edit', 'edit')->name('admin.setting.edit')->middleware('permission:setting-edit');
        Route::get('/setting/{id}/status', 'status')->name('admin.setting.status')->middleware('permission:setting-status');
        Route::put('/setting/{id}/update', 'update')->name('admin.setting.update')->middleware('permission:setting-update');
        Route::delete('/setting/{id}/delete', 'destroy')->name('admin.setting.delete')->middleware('permission:setting-delete');
    });



});