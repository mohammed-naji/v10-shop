<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
Route::prefix(LaravelLocalization::setLocale())->group(function() {

    Route::prefix('admin')->name('admin.')->middleware('auth', 'check', 'verified')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    Route::get('/', function () {
        return view('welcome');
    })->name('site.home');

    // Auth::routes(['register' => false]);
    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
