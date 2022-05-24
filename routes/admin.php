<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\NewCustomerController;

Route::group(['prefix' => 'adminfy', 'middleware' => ['auth:sanctum', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'customers', 'as' => 'customer.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [CustomerController::class, 'show'])->name('show');
        Route::post('/update', [CustomerController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
        Route::get('/list/{statusId}', [CustomerController::class, 'list'])->name('list');

    });

    Route::group(['prefix' => 'new-customers', 'as' => 'newCustomer.'], function () {
        Route::get('/', [NewCustomerController::class, 'index'])->name('index');
        Route::get('/show/{userId}', [NewCustomerController::class, 'show'])->name('show');
        Route::post('/confirm/{userId}', [NewCustomerController::class, 'confirm'])->name('confirm');
        Route::get('/cancel/{userId}', [NewCustomerController::class, 'cancel'])->name('cancel');
        Route::post('/cancel-store/{userId}', [NewCustomerController::class, 'cancelStore'])->name('cancelStore');
    });

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{blogId}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update', [BlogController::class, 'update'])->name('update');
        Route::post('/destroy/{blogId}', [BlogController::class, 'destroy'])->name('destroy');
    });
});
