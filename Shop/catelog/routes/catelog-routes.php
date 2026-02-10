<?php

use Illuminate\Support\Facades\Route;
use Shop\Catelog\Http\Controllers\BrandController;
use Shop\Catelog\Http\Controllers\CategoryController;
use Shop\Catelog\Http\Controllers\ProductController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(BrandController::class)->group(function () {
        // brand management
        Route::get('/brand', 'index')->name('admin.brand.index')->middleware('permission:brand-index');
        Route::get('/brand/create', 'create')->name('admin.brand.create')->middleware('permission:brand-create');
        Route::post('/brand/store', 'store')->name('admin.brand.store')->middleware('permission:brand-store');
        Route::get('/brand/{id}/edit', 'edit')->name('admin.brand.edit')->middleware('permission:brand-edit');
        Route::put('/brand/{id}/update', 'update')->name('admin.brand.update')->middleware('permission:brand-update');
        Route::delete('/brand/{id}/delete', 'destroy')->name('admin.brand.delete')->middleware('permission:brand-delete');
    });


    Route::controller(CategoryController::class)->group(function () {
        // brand management
        Route::get('/category', 'index')->name('admin.category.index')->middleware('permission:category-index');
        Route::get('/category/create', 'create')->name('admin.category.create')->middleware('permission:category-create');
        Route::post('/category/store', 'store')->name('admin.category.store')->middleware('permission:category-store');
        Route::get('/category/{id}/edit', 'edit')->name('admin.category.edit')->middleware('permission:category-edit');
        Route::put('/category/{id}/update', 'update')->name('admin.category.update')->middleware('permission:category-update');
        Route::delete('/category/{id}/delete', 'destroy')->name('admin.category.delete')->middleware('permission:category-delete');
    });


    Route::controller(ProductController::class)->group(function () {
        // brand management
        Route::get('/product', 'index')->name('admin.product.index')->middleware('permission:product-index');
        Route::get('/product/create', 'create')->name('admin.product.create')->middleware('permission:product-create');
        Route::post('/product/store', 'store')->name('admin.product.store')->middleware('permission:product-store');
        Route::get('/product/{id}/edit', 'edit')->name('admin.product.edit')->middleware('permission:product-edit');
        Route::put('/product/{id}/update', 'update')->name('admin.product.update')->middleware('permission:product-update');
        Route::delete('/product/{id}/delete', 'destroy')->name('admin.product.delete')->middleware('permission:product-delete');
    });

    

});
