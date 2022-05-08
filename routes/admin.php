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

Route::group(['prefix' => 'adminfy', 'middleware'=> ['auth:sanctum', 'role:admin'], 'as' => 'admin.'], function(){
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

    Route::group(['prefix' => 'newcustomers', 'as' => 'newcustomer.'], function () {
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

    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
        Route::post('/update', [CategoryController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');

        Route::group(['prefix' => 'feature/{productId}', 'as' => 'feature.'], function () {
            Route::get('/', [ProductFeatureController::class, 'index'])->name('index');
            Route::get('/create', [ProductFeatureController::class, 'create'])->name('create');
            Route::post('/store', [ProductFeatureController::class, 'store'])->name('store');
            Route::get('/edit/{featureId}', [ProductFeatureController::class, 'edit'])->name('edit');
            Route::post('/update', [ProductFeatureController::class, 'update'])->name('update');
            Route::post('/destroy/{featureId}', [ProductFeatureController::class, 'destroy'])->name('destroy');

        });
    });

    Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
        Route::get('/{status?}', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
        Route::post('/update', [OrderController::class, 'update'])->name('update');
        Route::get('/completeView/{id}', [OrderController::class, 'completeView'])->name('completeView');
        Route::post('/complete', [OrderController::class, 'complete'])->name('complete');
        Route::post('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'payment-settings', 'as' => 'payment-setting.'], function(){
        Route::get('/', [PaymentSettingController::class, 'index'])->name('index');
        Route::post('/update', [PaymentSettingController::class, 'update'])->name('update');
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

