<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('index.index');
Route::get('/book/{id}-{slug}', [IndexController::class, 'show'])->name('index.show');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/signup', [UserController::class, 'store'])->name('user.store');


Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/order', [OrderDetailsController::class, 'index'])->name('order.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add')->withoutMiddleware('auth');
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show')->withoutMiddleware('auth');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('cart/checkout', [OrdersController::class, 'index'])->name('checkout.index')->withoutMiddleware('auth');
    Route::post('cart/checkout', [OrdersController::class, 'store'])->name('checkout.store');
    Route::get('user/order', [OrdersController::class, 'show'])->name('order.show');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::put('/user/profile/{id}', [UserController::class, 'update'])->name('user.update');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/dashboard/author', AuthorController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/book', BookController::class);
    Route::get('/dashboard/orders', [OrdersController::class, 'indexAdmin'])->name('orders.indexAdmin');
    Route::put('/dashboard/orders/{id}', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard.index');
});