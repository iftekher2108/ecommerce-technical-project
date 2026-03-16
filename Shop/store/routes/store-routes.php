<?php

use Illuminate\Support\Facades\Route;
use Shop\Store\Http\Controllers\CartController;
use Shop\Store\Http\Controllers\StoreController;
use Shop\Store\Http\Controllers\UserAuthController;
use Shop\Store\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['web'])->group(function () {

    Route::controller(StoreController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::get('/shop', 'shop')->name('home.shop');
        Route::get('/product/{slug}','productDetail')->name('home.product');


        Route::get('/contact-us','contact')->name('home.contact');

    });

    Route::middleware('guest:web')->controller(UserAuthController::class)->group(function () {
        Route::get('/login', 'login')->name('home.login');
        Route::post('/login/store', 'loginStore')->name('home.login.store');

        Route::get('/register', 'register')->name('home.register');
        Route::post('/register/store', 'registerStore')->name('home.register.store');

        Route::get('/email/otp/verify', 'emailVerify')->name('user.email.verify');
        Route::post('/email/otp/verify', 'emailVerifySubmit')->name('user.emailSubmit.verify');
        Route::post('/email/otp/resend', 'emailResend')->name('user.email.resend');
    });


    Route::middleware(['auth:web'])->controller(UserProfileController::class)->group(function () {
        Route::get('/user/profile', 'userProfile')->name('user.profile');
        Route::post('/user/logout', 'logout')->name('user.logout');

        // Profile Routes
        Route::get('/user/profile/edit', 'editProfile')->name('profile.edit');
        Route::post('/user/profile/update', 'updateProfile')->name('profile.update');

        // Wishlist Routes
        Route::get('/user/wishlist', 'userWishlist')->name('profile.wishlist');
        Route::post('/user/wishlist/add', 'addToWishlist')->name('wishlist.add');
        Route::post('/user/wishlist/remove', 'removeFromWishlist')->name('wishlist.remove');


        // Checkout Routes
        Route::get('/user/checkout', 'userCheckout')->name('profile.checkout');
        Route::post('/user/checkout/process', 'processCheckout')->name('checkout.process');

        // Orders Routes
        Route::get('/user/orders', 'userOrders')->name('profile.orders');
        Route::get('/user/orders/{id}', 'viewOrder')->name('order.view');

        // Address Routes
        Route::get('/user/addresses', 'userAddresses')->name('profile.addresses');
        Route::post('/user/address/add', 'addAddress')->name('address.add');
        Route::post('/user/address/update', 'updateAddress')->name('address.update');
        Route::post('/user/address/delete', 'deleteAddress')->name('address.delete');

        // Settings Routes
        Route::get('/user/settings', 'userSettings')->name('profile.settings');
        Route::post('/user/settings/password', 'updatePassword')->name('settings.password');
    });

    Route::middleware(['auth:web'])->controller(CartController::class)->group(function () {
        // Cart Routes
        Route::get('/user/cart', 'userCart')->name('profile.cart');
        Route::post('/user/cart/add', 'addToCart')->name('cart.add');
        Route::put('/user/cart/update', 'updateCart')->name('cart.update');
        Route::delete('/user/cart/remove', 'removeFromCart')->name('cart.remove');
    });

    
});
