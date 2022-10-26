<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('/', function () {
    return view('welcome');
})->name('site.home');
