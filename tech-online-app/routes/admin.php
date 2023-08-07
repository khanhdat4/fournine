<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/', [LoginController::class, 'check']);
Route::middleware('guest')->group(function (){
});
Route::middleware('auth:admin')->name('admin.')->group(function (){
    //product
    Route::get('/product-info', [ProductController::class, 'index'])->name('product.info');
    Route::get('/product-add', [ProductController::class, 'addProduct'])->name('product.add');
    Route::post('/product-add', [ProductController::class, 'postProduct'])->name('product.add');
    Route::get('/product-edit/{id}', [ProductController::class, 'getEdit'])->name('product.getedit');
    Route::post('/product-edit', [ProductController::class, 'postEdit'])->name('product.postedit');
    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/delete-img/{productId}/{imgId}', [ProductController::class, 'deleteImg'])->name('product.delete.img');
    //user
    Route::get('/user-info', [UserController::class, 'userInfo'])->name('user.info');
    Route::get('/user-add', [UserController::class, 'addUser'])->name('user.add');
    Route::post('/user-add', [UserController::class, 'postAddUser'])->name('user.postadd');
    Route::get('/user-delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    //order
    Route::get('/order', [OrderController::class, 'show'])->name('order');
    Route::post('/order-confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::post('/order-cancel', [OrderController::class, 'cancel'])->name('order.cancel');
    Route::get('order/{id}', [OrderController::class, 'detail'])->name('order.detail');

    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});
