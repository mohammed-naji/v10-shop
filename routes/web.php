<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('/', function () {
    return view('welcome');
})->name('site.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
