<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Company\CargoTrackingController;
use App\Http\Controllers\Company\CategoryController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\ContactController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\User\UserContactController as UserUserContactController;
use App\Http\Controllers\Web\ContactController as WebContactController;
use App\Http\Controllers\Web\PolicyController;
use App\Http\Controllers\Web\StaticPageController;
use App\Models\Company;

Route::get('/send-mail', [MailController::class, 'sendMail'])->name('send.mail');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/iletisim', [WebContactController::class, 'index'])->name('contact');
Route::post('/iletisim/gonder', [WebContactController::class, 'send'])->name('contact.send');

Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/hemen-basla', [StaticPageController::class, 'startNow'])->name('startNow');
Route::get('/fiyatlandirma', [StaticPageController::class, 'pricing'])->name('pricing');

Route::group(['prefix' => 'politikalar', 'as' => 'policy.'], function () {
    Route::get('/', [PolicyController::class, 'index'])->name('index');
    Route::get('/garanti-iade', [PolicyController::class, 'varranty'])->name('varranty');
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
                Route::post('/threeds-initialize', [CompanyController::class, 'payment'])->name('payment');
                Route::post('/threeds-payment', [CompanyController::class, 'threedsPayment'])->name('threedsPayment');
                Route::get('/result/{orderId}', [CompanyController::class, 'result'])->name('result');
            });

            Route::group(['prefix' => 'siparis-takip', 'as' => 'cargoTracking.'], function () {
                Route::get('/', [CargoTrackingController::class, 'index'])->name('index');
                Route::get('{slug}', [CategoryController::class, 'show'])->name('show');
            });

            Route::group(['prefix' => 'iletisim', 'as' => 'contact.'], function () {
                Route::get('/', [ContactController::class, 'index'])->name('index');
                Route::get('{slug}', [ContactController::class, 'show'])->name('show');
                Route::post('/gonder', [ContactController::class, 'send'])->name('send');
            });
        });
    });
}
