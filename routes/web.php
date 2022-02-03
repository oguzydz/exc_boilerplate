<?php

/**
 * Route Helper
 */

use App\Http\Controllers\Api\CartController;
use Illuminate\Support\Facades\Route;

/**
 * Pages Controllers
 */

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\PolicyController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ShopController;
use App\Models\Company;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim/gonder', [ContactController::class, 'send'])->name('contact.send');

Route::group(['prefix' => 'urunler', 'as' => 'product.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'politikalar', 'as' => 'policy.'], function () {
    Route::get('/garanti-iade', [PolicyController::class, 'index'])->name('index');
    Route::get('/gizlilik-guvenlik', [PolicyController::class, 'security'])->name('security');
    Route::get('/odeme-teslimat', [PolicyController::class, 'delivery'])->name('delivery');
    Route::get('/uyelik-sozlesmesi', [PolicyController::class, 'agreement'])->name('agreement');
    Route::get('/satıs-sozlesmesi', [PolicyController::class, 'sales'])->name('sales');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('{slug}', [BlogController::class, 'show'])->name('show');
});


/**
 * Company Pages
 */
$companies = Company::all('slug');
foreach ($companies as $company) {
    Route::group(['slug' => $company->slug], function () use ($company) {
        Route::group(['prefix' => $company->slug, 'as' => "$company->slug."], function () {
            Route::get('/', [CompanyController::class, 'index'])->name('index');

            Route::group(['prefix' => 'urun', 'as' => 'product.'], function () {
                Route::get('{productSlug}', [CompanyController::class, 'show'])->name('show');
            });

            Route::group(['prefix' => 'kategoriler', 'as' => 'category.'], function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('{slug}', [CategoryController::class, 'show'])->name('show');
            });

            Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
                Route::get('/checkout', [CompanyController::class, 'checkout'])->name('checkout');
            });
        });

    });
}
