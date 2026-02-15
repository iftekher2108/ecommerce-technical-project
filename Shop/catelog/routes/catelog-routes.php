<?php

use Illuminate\Support\Facades\Route;
use Shop\Catelog\Http\Controllers\BrandController;
use Shop\Catelog\Http\Controllers\CategoryController;
use Shop\Catelog\Http\Controllers\CouponController;
use Shop\Catelog\Http\Controllers\ProductController;

Route::prefix('admin')->middleware(['web', 'auth:admin'])->group(function () {

    Route::controller(BrandController::class)->group(function () {
        // brand management
        Route::get('/brand', 'index')->name('admin.brand.index')->middleware('permission:brand-index');
        Route::get('/brand/create', 'create')->name('admin.brand.create')->middleware('permission:brand-create');
        Route::post('/brand/store', 'store')->name('admin.brand.store')->middleware('permission:brand-store');
        Route::get('/brand/{id}/edit', 'edit')->name('admin.brand.edit')->middleware('permission:brand-edit');
        Route::get('/brand/{id}/status', 'status')->name('admin.brand.status')->middleware('permission:brand-status');
        Route::put('/brand/{id}/update', 'update')->name('admin.brand.update')->middleware('permission:brand-update');
        Route::delete('/brand/{id}/delete', 'destroy')->name('admin.brand.delete')->middleware('permission:brand-delete');
    });


    Route::controller(CategoryController::class)->group(function () {
        // brand management
        Route::get('/category', 'index')->name('admin.category.index')->middleware('permission:category-index');
        Route::get('/category/create', 'create')->name('admin.category.create')->middleware('permission:category-create');
        Route::post('/category/store', 'store')->name('admin.category.store')->middleware('permission:category-store');
        Route::get('/category/{id}/edit', 'edit')->name('admin.category.edit')->middleware('permission:category-edit');
        Route::get('/category/{id}/status', 'status')->name('admin.category.status')->middleware('permission:category-status');
        Route::put('/category/{id}/update', 'update')->name('admin.category.update')->middleware('permission:category-update');
        Route::delete('/category/{id}/delete', 'destroy')->name('admin.category.delete')->middleware('permission:category-delete');
    });


    Route::controller(ProductController::class)->group(function () {
        // brand management
        Route::get('/product', 'index')->name('admin.product.index')->middleware('permission:product-index');
        Route::get('/product/create', 'create')->name('admin.product.create')->middleware('permission:product-create');
        Route::post('/product/store', 'store')->name('admin.product.store')->middleware('permission:product-store');
        Route::get('/product/{id}/edit', 'edit')->name('admin.product.edit')->middleware('permission:product-edit');
        Route::get('/product/{id}/status', 'status')->name('admin.product.status')->middleware('permission:product-status');
        Route::put('/product/{id}/update', 'update')->name('admin.product.update')->middleware('permission:product-update');
        Route::delete('/product/{id}/delete', 'destroy')->name('admin.product.delete')->middleware('permission:product-delete');
    });


    Route::controller(CouponController::class)->group(function () {
        // brand management
        Route::get('/coupon', 'index')->name('admin.coupon.index')->middleware('permission:coupon-index');
        Route::get('/coupon/create', 'create')->name('admin.coupon.create')->middleware('permission:coupon-create');
        Route::post('/coupon/store', 'store')->name('admin.coupon.store')->middleware('permission:coupon-store');
        Route::get('/coupon/{id}/edit', 'edit')->name('admin.coupon.edit')->middleware('permission:coupon-edit');
        Route::get('/coupon/{id}/status', 'status')->name('admin.coupon.status')->middleware('permission:coupon-status');
        Route::put('/coupon/{id}/update', 'update')->name('admin.coupon.update')->middleware('permission:coupon-update');
        Route::delete('/coupon/{id}/delete', 'destroy')->name('admin.coupon.delete')->middleware('permission:coupon-delete');
    });


});
