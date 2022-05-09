<?php


/**
 * Route Helper
 */

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

/**
 * Page Controllers
 */

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\NewCustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\ProductFeatureController;

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
    });

    Route::group(['prefix' => 'new-customers', 'as' => 'newCustomer.'], function () {
        Route::get('/', [NewCustomerController::class, 'index'])->name('index');
        Route::get('/create', [NewCustomerController::class, 'create'])->name('create');
        Route::post('/store', [NewCustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [NewCustomerController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [NewCustomerController::class, 'show'])->name('show');
        Route::get('/confirm/{id}', [NewCustomerController::class, 'confirm'])->name('confirm');
        Route::get('/cancel/{id}', [NewCustomerController::class, 'cancelShow'])->name('cancelShow');
        Route::post('/cancelStore/{id}', [NewCustomerController::class, 'cancelStore'])->name('cancelStore');
        Route::post('/update', [NewCustomerController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [NewCustomerController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/destroy/{id}', [BlogController::class, 'destroy'])->name('destroy');
        Route::post('/update', [BlogController::class, 'update'])->name('update');
        Route::get('/', [BlogController::class, 'index'])->name('index');
    });
});
