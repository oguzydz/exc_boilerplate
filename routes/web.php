<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Company\CargoTrackingController;
use App\Http\Controllers\Company\CategoryController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\ContactController;
use App\Http\Controllers\Web\ContactController as WebContactController;
use App\Http\Controllers\Web\PolicyController;
use App\Http\Controllers\Web\StaticPageController;
use App\Models\Company;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/iletisim', [WebContactController::class, 'index'])->name('contact');
Route::post('/iletisim/gonder', [WebContactController::class, 'send'])->name('contact.send');

Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');

Route::get('/hemen-basla', [StaticPageController::class, 'startNow'])->name('startNow');
Route::get('/fiyatlandirma', [StaticPageController::class, 'pricing'])->name('pricing');
Route::get('/magazalar', [StaticPageController::class, 'store'])->name('store');


Route::group(['prefix' => 'politikalar', 'as' => 'policy.'], function () {
    Route::get('/', [PolicyController::class, 'index'])->name('index');
    Route::get('/uyelik-sozlesmesi', [PolicyController::class, 'rule1'])->name('rule1');
    Route::get('/kullanim-kosulllari', [PolicyController::class, 'rule2'])->name('rule2');
    Route::get('/uygulama-magazasi', [PolicyController::class, 'rule3'])->name('rule3');
    Route::get('/listeleme-kurallari', [PolicyController::class, 'rule4'])->name('rule4');
    Route::get('/yasakli-urunler', [PolicyController::class, 'rule5'])->name('rule5');
    Route::get('/alisveris-guvenligi', [PolicyController::class, 'rule6'])->name('rule6');
    Route::get('/hizmet-bedeli-kosullari', [PolicyController::class, 'rule7'])->name('rule7');
    Route::get('/on-bilgilendirme-formu', [PolicyController::class, 'rule8'])->name('rule8');
    Route::get('/mesafeli-satis-sozlesmesi', [PolicyController::class, 'rule9'])->name('rule9');
    Route::get('/teslim-kosullari', [PolicyController::class, 'rule10'])->name('rule10');
    Route::get('/iade-kosullari', [PolicyController::class, 'rule11'])->name('rule11');
    Route::get('/kvkk', [PolicyController::class, 'rule12'])->name('rule12');
    Route::get('/uygulama-kvkk', [PolicyController::class, 'rule13'])->name('rule13');
    Route::get('/yasal-uyarilar', [PolicyController::class, 'rule14'])->name('rule14');
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
                Route::get('/checkout', [CompanyController::class, 'checkout'])->name('checkout')->middleware(['check.checkout']);
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
