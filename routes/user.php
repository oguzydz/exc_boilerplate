<?php

use App\Http\Controllers\User\CompanyCargoSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CommissionController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\ConfirmationController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductGalleryController;

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'role:user', 'user.status'], 'as' => 'user.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/store', [DashboardController::class, 'store'])->name('store');
    });

    Route::get('/settings', [UserProfileController::class, 'show'])->name('setting')->withoutMiddleware('user.status');

    Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::post('/update', [CompanyController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'cargo-settings', 'as' => 'cargoSetting.'], function () {
        Route::get('/', [CompanyCargoSettingController::class, 'index'])->name('index');
        Route::post('/update', [CompanyCargoSettingController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/pasive', [CategoryController::class, 'pasive'])->name('pasive');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{categoryId}', [CategoryController::class, 'edit'])->name('edit');
        Route::get('/show/{categoryId}', [CategoryController::class, 'show'])->name('show');
        Route::post('/update', [CategoryController::class, 'update'])->name('update');
        Route::post('/destroy/{categoryId}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('/retrieve/{categoryId}', [CategoryController::class, 'retrieve'])->name('retrieve');
    });

    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/pasive', [ProductController::class, 'pasive'])->name('pasive');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{productId}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/show/{productId}', [ProductController::class, 'show'])->name('show');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
        Route::post('/destroy/{productId}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('/retrieve/{categoryId}', [ProductController::class, 'retrieve'])->name('retrieve');

        Route::group(['prefix' => 'gallery/{productId}', 'as' => 'gallery.'], function () {
            Route::get('/', [ProductGalleryController::class, 'index'])->name('index');
            Route::get('/create', [ProductGalleryController::class, 'create'])->name('create');
            Route::post('/store', [ProductGalleryController::class, 'store'])->name('store');
            Route::get('/edit/{galleryId}', [ProductGalleryController::class, 'edit'])->name('edit');
            Route::post('/update', [ProductGalleryController::class, 'update'])->name('update');
            Route::post('/destroy/{galleryId}', [ProductGalleryController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/shipped', [OrderController::class, 'shipped'])->name('shipped');
        Route::get('/completed', [OrderController::class, 'completed'])->name('completed');
        Route::get('/other', [OrderController::class, 'other'])->name('other');
        Route::get('/show/{orderId}', [OrderController::class, 'show'])->name('show');
        Route::get('/create/{orderId}', [OrderController::class, 'create'])->name('create');
        Route::post('/store/{orderId}', [OrderController::class, 'store'])->name('store');
        Route::post('/update/{orderId}', [OrderController::class, 'update'])->name('update');
        Route::post('/sent-payment/{orderId}', [OrderController::class, 'sentPayment'])->name('sent-payment');
        Route::post('/cancel-order/{orderId}', [OrderController::class, 'cancelOrder'])->name('cancel-order');
    });

    Route::group(['prefix' => 'payments', 'as' => 'payment.'], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('show');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [PaymentController::class, 'store'])->name('store');
        Route::post('/update/{payment}', [PaymentController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'confirmation', 'as' => 'confirmation.'], function () {
        Route::get('/', [ConfirmationController::class, 'index'])->name('index');
        Route::get('/other', [ConfirmationController::class, 'other'])->name('other');
        Route::post('/store', [ConfirmationController::class, 'store'])->name('store')
            ->withoutMiddleware(['user.status'])->middleware(['user.check.confirmation.store']);
    });

    Route::group(['prefix' => 'contacts', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/show/{contactId}', [ContactController::class, 'show'])->name('show');
        Route::post('/destroy/{contactId}', [ContactController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'commissions', 'as' => 'commission.'], function () {
        Route::get('/', [CommissionController::class, 'index'])->name('index');
        Route::get('/show/{commissionId}', [CommissionController::class, 'show'])->name('show');
        Route::post('/destroy/{contactId}', [CommissionController::class, 'destroy'])->name('destroy');
    });
});


//, 'excluded_middleware' => ['user.status']
