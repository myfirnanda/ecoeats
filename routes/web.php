<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\SignupController;
use App\Http\Controllers\user\UserCartController;
use App\Http\Controllers\user\UserWishlistController;

// General
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware('auth')
    ->group(function() {
        Route::post('/products/{product:slug}/addToCart', [ProductController::class, 'addToCart'])->name('products.addToCart');
        Route::post('/products/{product:slug}/directCheckout', [ProductController::class, 'directCheckout'])->name('products.directCheckout');
        Route::post('/products/{product:slug}/addToWishlist', [ProductController::class, 'addToWishlist'])->name('products.addToWishlist');
        Route::get('/checkout/cities/{id}', [CheckoutController::class, 'getCities'])->name('checkout.getCities');
        Route::post('/checkout/check_shipping-price', [CheckoutController::class, 'shippingPrice'])->name('checkout.shippingPrice');
        Route::get('/checkout/vouchers/{code}', [CheckoutController::class, 'getVoucher'])->name('checkout.getVoucher');
        Route::get('/checkout/order-summary', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/order-summary', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('checkout.callback');
    });

// AUTH
Route::get('/signup', [SignupController::class, 'index'])->middleware('guest')->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// DASHBOARD
Route::prefix('user')
    ->middleware('auth')
    ->group(function() {
        Route::resource('cart', UserCartController::class)->only(['index', 'destroy'])->names([
            'index' => 'user.cart.index',
            // 'update' => 'user.cart.update',
            'destroy' => 'user.cart.destroy',
        ]);
        Route::put('/cart/updateAll', [UserCartController::class, 'updateAll'])->name('user.cart.updateAll');
        Route::post('/cart/clear', [UserCartController::class, 'clear'])->name('user.cart.clear');
        Route::resource('wishlist', UserWishlistController::class)->only(['index', 'update', 'destroy'])->names([
            'index' => 'user.wishlist.index',
            'update' => 'user.wishlist.update',
            'destroy' => 'user.wishlist.destroy',
        ]);
        // Route::get('/settings', [UserDashboardController::class, 'index']);
        // Route::get('/cart', [CartController::class, 'index']);
    });

// ADMIN
Route::prefix('admin')
    // ->middleware('admin')
    ->group(function() {
        // DASHBOARD
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::resource('/products', AdminProductController::class, [
            'names' => [
                'index' => 'admin.products.index',
                'create' => 'admin.products.create',
                'store' => 'admin.products.store',
                'show' => 'admin.products.show',
                'edit' => 'admin.products.edit',
                'update' => 'admin.products.update',
                'destroy' => 'admin.products.destroy',
            ]
        ]);
        Route::resource('/categories', AdminCategoryController::class, [
            'names' => [
                'index' => 'admin.categories.index',
                'store' => 'admin.categories.store',
                'create' => 'admin.categories.create',
                'show' => 'admin.categories.show',
                'edit' => 'admin.categories.edit',
                'destroy' => 'admin.categories.destroy',
            ]
        ]);
        Route::resource('/orders', AdminOrderController::class, [
            'names' => [
                'index' => 'admin.orders.index',
                'store' => 'admin.orders.store',
                'create' => 'admin.orders.create',
                'show' => 'admin.orders.show',
                'edit' => 'admin.orders.edit',
                'destroy' => 'admin.orders.destroy',
            ]
        ]);
    });
