<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\NewCustomerController;
use App\Http\Controllers\Admin\OrderController;

Route::group(['prefix' => 'adminfy', 'middleware' => ['auth:sanctum', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'customers', 'as' => 'customer.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::get('/show/{userId}', [CustomerController::class, 'show'])->name('show');
        Route::post('/update', [CustomerController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
        Route::get('/list/{statusId}', [CustomerController::class, 'list'])->name('list');
        Route::post('/active/{userId}', [CustomerController::class, 'active'])->name('active');
        Route::get('/pasive/{userId}', [CustomerController::class, 'pasive'])->name('pasive');
        Route::post('/pasive-store/{userId}', [CustomerController::class, 'pasiveStore'])->name('pasiveStore');

    });

    Route::group(['prefix' => 'contacts', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/show/{contactId}', [ContactController::class, 'show'])->name('show');
        Route::post('/destroy/{contactId}', [ContactController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'commission', 'as' => 'commission.'], function () {
        Route::get('/', [CommissionController::class, 'index'])->name('index');
        Route::get('/create', [CommissionController::class, 'create'])->name('create');
        Route::post('/store', [CommissionController::class, 'store'])->name('store');
        Route::get('/edit/{commissionId}', [CommissionController::class, 'edit'])->name('edit');
        Route::post('/update/{commissionId}', [CommissionController::class, 'update'])->name('update');
        Route::post('/destroy/{commissionId}', [CommissionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/shipped', [OrderController::class, 'shipped'])->name('shipped');
        Route::get('/completed', [OrderController::class, 'completed'])->name('completed');
        Route::get('/other', [OrderController::class, 'other'])->name('other');
        Route::get('/show/{orderId}', [OrderController::class, 'show'])->name('show');
        Route::get('/paymentApprove/{orderId}', [OrderController::class, 'paymentApprove'])->name('paymentApprove');
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
