<?php


/**
 * Route Helper
 */

use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\ConfirmationController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Page Controllers
 */

use App\Http\Controllers\User\ProductController;
// use App\Http\Controllers\OrderController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Middleware\RedirectIfNew;

Route::group(['prefix' => 'user', 'middleware'=> ['auth:sanctum', 'role:user', 'user.status'], 'as' => 'user.'], function() {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/store', [DashboardController::class, 'store'])->name('store');
    });

    Route::get('/settings', [UserProfileController::class, 'show'])->name('setting')->withoutMiddleware('user.status');

    Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::post('/update', [CompanyController::class, 'update'])->name('update');
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

    Route::group(['prefix' => 'products', 'as' => 'product.'], function() {
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

        Route::group(['prefix' => 'gallery/{productId}', 'as' => 'gallery.'], function () {
            Route::get('/', [ProductGalleryController::class, 'index'])->name('index');
            Route::get('/create', [ProductGalleryController::class, 'create'])->name('create');
            Route::post('/store', [ProductGalleryController::class, 'store'])->name('store');
            Route::get('/edit/{galleryId}', [ProductGalleryController::class, 'edit'])->name('edit');
            Route::post('/update', [ProductGalleryController::class, 'update'])->name('update');
            Route::post('/destroy/{galleryId}', [ProductGalleryController::class, 'destroy'])->name('destroy');
        });
    });


    Route::group(['prefix' => 'orders', 'as' => 'order.'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('update');
        Route::post('/sent-payment/{order}', [OrderController::class, 'sentPayment'])->name('sent-payment');
        Route::post('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('cancel-order');
    });

    Route::group(['prefix' => 'payments', 'as' => 'payment.'], function() {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('show');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [PaymentController::class, 'store'])->name('store');
        Route::post('/update/{payment}', [PaymentController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'confirmation', 'as' => 'confirmation.'], function() {
        Route::get('/', [ConfirmationController::class, 'index'])->name('index');
        Route::post('/store', [ConfirmationController::class, 'store'])->name('store');
    });

});


//, 'excluded_middleware' => ['user.status']
