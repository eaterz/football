<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', [ProductController::class, 'index'])->middleware('auth')->name('welcome');
    Route::get('/products/{name}/show', [ProductController::class, 'show'])->middleware('auth')->name('products.show');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});




Route::group(['middleware' => AdminMiddleware::class], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/create', [AdminController::class, 'create'])->name('products.create');
    Route::post('/create/store', [AdminController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('products.edit');
    Route::patch('/edit/{id}/update', [AdminController::class, 'update'])->name('products.update');

    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('products.destroy');


});
