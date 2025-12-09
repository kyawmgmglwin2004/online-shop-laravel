<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OmailControlle;
use App\Http\Controllers\OmailController;
use App\Http\Middleware\AdminMiddleware;



Route::get('/', function () {
    return redirect('/products');
});

Auth::routes();
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'addForm'])->middleware(AdminMiddleware::class);
Route::post('/products/create', [ProductController::class, 'create'])->middleware(AdminMiddleware::class);
Route::get('/products/show/{id}', [ProductController::class, 'show']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware(AdminMiddleware::class);
Route::post('/products/edit/{id}', [ProductController::class, 'update'])->middleware(AdminMiddleware::class);
Route::get('/products/category/{id}', [CategoryController::class, 'category']);
Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->middleware(AdminMiddleware::class);

Route::get('/products/buy/{id}',
[OrderController::class, 'buy'])->middleware('auth');
Route::post('/products/buy/{id}', 
[OrderController::class, 'order'])->middleware('auth');
Route::get('/orders', [OrderController::class, 'list'])->middleware(AdminMiddleware::class);
Route::get('/orders/{id}', [OrderController::class, 'destroy'])->middleware(AdminMiddleware::class);
Route::get('/users', [UserController::class, 'index'])->middleware(AdminMiddleware::class);
Route::get('/users/suspend/{id}', [UserController::class, 'ban'])->middleware(AdminMiddleware::class);
Route::get('/users/unsuspend/{id}', [UserController::class, 'unban'])->middleware(AdminMiddleware::class);
Route::get('/mails', [OmailController::class, 'mail']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(AdminMiddleware::class);

