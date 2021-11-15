<?php


/**
 * Route Helper
 */

use App\Http\Controllers\User\CategoryController;
use Illuminate\Support\Facades\Route;

/**
 * Page Controllers
 */

use App\Http\Controllers\User\ProductController;
// use App\Http\Controllers\OrderController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;

Route::group(['prefix' => 'user', 'middleware'=> ['auth:sanctum', 'role:user'], 'as' => 'user.'], function(){

    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/settings', [UserProfileController::class, 'show'])->name('setting');

    Route::group(['prefix' => 'products', 'as' => 'product.'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'categories', 'as' => 'category.'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/{categorySlug}', [CategoryController::class, 'show'])->name('show');
    });


    Route::group(['prefix' => 'orders', 'as' => 'order.'], function(){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('update');
        Route::post('/sent-payment/{order}', [OrderController::class, 'sentPayment'])->name('sent-payment');
        Route::post('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('cancel-order');
    });

    Route::group(['prefix' => 'payments', 'as' => 'payment.'], function(){
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('show');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [PaymentController::class, 'store'])->name('store');
        Route::post('/update/{payment}', [PaymentController::class, 'update'])->name('update');
    });

});

