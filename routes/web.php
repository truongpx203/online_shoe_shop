<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    


    Route::get('/', [App\Http\Controllers\Controller::class , 'index'])->name('dashboard');

    Route::controller(App\Http\Controllers\UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::post('{id}/edit', 'edit')->name('edit');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(App\Http\Controllers\ProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::post('{id}/edit', 'edit')->name('edit');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(App\Http\Controllers\CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::post('{id}/edit', 'edit')->name('edit');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(App\Http\Controllers\InvoiceController::class)->prefix('invoice')->name('invoices.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail/{id}', 'detail')->name('detail');
    });
});

Route::get('/', [App\Http\Controllers\template\ProductController::class , 'home'])->name('home');
Route::get('/product_category/{id}', [App\Http\Controllers\template\ProductController::class , 'viewProduct'])->name('product');
Route::get('/product', [App\Http\Controllers\template\ProductController::class , 'indexProduct'])->name('product.index');
Route::get('/product/{id}', [App\Http\Controllers\template\ProductController::class , 'show'])->name('product.detail');

Route::controller(App\Http\Controllers\template\ProductController::class)->prefix('cart')->group(function () {
    Route::get('/', 'cart')->name('cart');
    Route::get('/add-cart/{id}', 'addCart')->name('addCart');
    Route::post('/update-cart', 'updateCart')->name('updateCart');
    Route::post('/post-cart', 'postCart')->name('postCart');
});


Route::get('/login', [App\Http\Controllers\template\ProductController::class , 'login'])->name('login');
Route::post('/postLogin', [App\Http\Controllers\template\ProductController::class , 'postLogin'])->name('postLogin');
Route::get('/logout', [App\Http\Controllers\template\ProductController::class , 'logout'])->name('logout');

Route::get('/registration', [App\Http\Controllers\template\ProductController::class , 'registration'])->name('registration');
Route::post('/store-regist', [App\Http\Controllers\template\ProductController::class , 'storeRegist'])->name('storeRegist');


Route::controller(App\Http\Controllers\ResetPasswordController::class)->prefix('resetPassword')->name('resetPassword.')->group(function () {

    Route::get('create', 'create')->name('create');

    Route::post('store', 'store')->name('store');

    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('resetPassword');

    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});

Route::get('/contact', function (){
    return view('contact');
})->name('contact');
