<?php

use Illuminate\Support\Facades\Route;
use Shop\Appearance\Http\Controllers\SliderController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(SliderController::class)->group(function () {
        // brand management
        Route::get('/slider', 'index')->name('admin.slider.index')->middleware('permission:slider-index');
        Route::get('/slider/create', 'create')->name('admin.slider.create')->middleware('permission:slider-create');
        Route::post('/slider/store', 'store')->name('admin.slider.store')->middleware('permission:slider-store');
        Route::get('/slider/{id}/edit', 'edit')->name('admin.slider.edit')->middleware('permission:slider-edit');
        Route::get('/slider/{id}/status', 'status')->name('admin.slider.status')->middleware('permission:slider-status');
        Route::put('/slider/{id}/update', 'update')->name('admin.slider.update')->middleware('permission:slider-update');
        Route::delete('/slider/{id}/delete', 'destroy')->name('admin.slider.delete')->middleware('permission:slider-delete');
    });

    

});
