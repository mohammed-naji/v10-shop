<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SendNotifyController;
use App\Http\Controllers\SiteController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
Route::prefix(LaravelLocalization::setLocale())->group(function() {

    Route::prefix('admin')->name('admin.')->middleware('auth', 'check', 'verified')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });

    Route::get('/', [SiteController::class, 'index'])->name('site.home');
    Route::get('/about', [SiteController::class, 'about'])->name('site.about');
    Route::get('/shop', [SiteController::class, 'shop'])->name('site.shop');
    Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
    Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');
    Route::get('/product/{id}', [SiteController::class, 'product'])->name('site.product');
    Route::post('/product/{id}/review', [SiteController::class, 'review'])->name('site.review');
    Route::get('/search', [SiteController::class, 'search'])->name('site.search');


    Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('site.add_to_cart');
    Route::get('/remove-cart/{id}', [CartController::class, 'remove_cart'])->name('site.remove_cart');
    Route::get('/cart', [CartController::class, 'cart'])->name('site.cart')->middleware('auth');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('site.checkout')->middleware('auth');
    Route::get('/payment', [CartController::class, 'payment'])->name('site.payment')->middleware('auth');

    Route::view('/payment/success', 'site.success')->name('site.payment_success');
    Route::view('/payment/fail', 'site.fail')->name('site.payment_fail');


    // Auth::routes(['register' => false]);
    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Route::get('send-notify', [SendNotifyController::class, 'send_notify']);
Route::get('all-notify', [SendNotifyController::class, 'all_notify']);
Route::get('read-notify/{id}', [SendNotifyController::class, 'read_notify'])->name('read_notify');
