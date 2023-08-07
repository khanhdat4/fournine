<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    // GUEST
    Route::middleware('guest')->group( function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');


    });


    // USER
    Route::middleware('auth')->group( function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        //cart
        Route::get('/cart', 'CartController@show')->name('cart');
        Route::post('/cart', 'CartController@add')->name('cart.add');
        Route::get('/cart-remove', 'CartController@remove')->name('cart.remove');
        Route::post('/cart-update', 'CartController@update')->name('cart.update');

        //Check out
        Route::get('/checkout', 'CheckoutController@show')->name('checkout.show');
        Route::post('/checkout', 'CheckoutController@show')->name('checkout.show');
        Route::post('/process-checkout', 'CheckoutController@checkout')->name('checkout.post');
        Route::get('/success', function(){
            return view('pages.success');
        })->name('checkout.success');

        //user edit
        Route::prefix('user')->name('user.')->group(function(){

            Route::get('/profile', 'UserAccountController@show')->name('show');
            Route::post('/update', 'UserAccountController@update')->name('update');
            Route::get('order', [OrderController::class, 'show'])->name('order');
            Route::get('order/{id}', [OrderController::class, 'detail'])->name('order.detail');
            Route::delete('order/{id}', [OrderController::class, 'cancel'])->name('order.cancel');
        });
    });



    //product
    Route::get('/product', 'ProductController@show')->name('product');
    Route::get('/product/{id?}', 'ProductController@details')->name('product-details');

    //about
    Route::get('/about', function() {
        return view('pages.about');
    })->name('about');

    //contact
    Route::get('/contact', function() {
        return view('pages.contact');
    })->name('contact');





    Route::fallback(function(){ abort(404); });
});
