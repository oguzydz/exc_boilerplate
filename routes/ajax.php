<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
|
| Here is where you can register AJAX routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "ajax" middleware group. Enjoy building your AJAX!
|
*/

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::post('/add/{productId}', [CartController::class, 'add'])->name('add');
    Route::post('/update/{productId}/{qty}', [CartController::class, 'update'])->name('update');
    Route::post('/remove/{productId}', [CartController::class, 'remove'])->name('remove');

});

