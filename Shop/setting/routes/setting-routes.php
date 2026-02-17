<?php

use Illuminate\Support\Facades\Route;
use Shop\Setting\Http\Controllers\SettingController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(SettingController::class)->group(function () {
        // setting management
        Route::get('/setting', 'index')->name('admin.setting.index')->middleware('permission:setting-index');
        Route::post('/setting/store', 'store')->name('admin.setting.store')->middleware('permission:setting-store');
    });


});