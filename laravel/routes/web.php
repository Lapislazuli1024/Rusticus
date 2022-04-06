<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FarmerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionController;

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
//Home
Route::get('/', function () {
    return view('welcome.welcome');
});

//Authentication Routes
// => Register
Route::get('/user/register', [RegisterController::class, 'create'])->name('create.register');
Route::post('/user/register', [RegisterController::class, 'store'])->name('store.register');
// => Login/Session
Route::get('/user/login', [SessionController::class, 'create'])->name('create.login');
Route::post('/user/login', [SessionController::class, 'store'])->name('store.login');
Route::post('/user/logout', [SessionController::class, 'destroy'])->name('destroy.session');

//Farmer Routes //create //store
Route::get('/farmers',[FarmerController::class,'createAllFarmer'])->name('farmers');
Route::get('/farmer/{farmer:id}',[FarmerController::class,'createOneFarmer'])->name('farmer');

//Product Routes
Route::get('/products',[ProductController::class,'createAllProduct'])->name('products');
Route::get('/product/{product:id}',[ProductController::class,'createOneProduct'])->name('product');

//Search
Route::post('/search',[SearchController::class,'index'])->name('search.results');
Route::post('/livesearch',[SearchController::class, 'livesearch'])->name('livesearch');

//Cart
Route::get('/cart/show',[CartController::class,'createCart'])->name('cart');
Route::get('/cart/add/{product:id}', [CartController::class,'storeCartAdd'])->name('addtocart');
Route::get('/cart/remove/{product:id}', [CartController::class,'storeCartRemove'])->name('removefromcart');
Route::get('/cart/increment/{product:id}', [CartController::class,'storeCartIncrement'])->name('incrementincart');
Route::get('/cart/decrement/{product:id}', [CartController::class,'storeCartDecrement'])->name('decrementincart');


//Reservation
Route::get('/reservation/show',[ReservationController::class,'createReservation'])->name('reservation');
Route::get('/reservation/checkout',[ReservationController::class,'storeCheckout'])->name('checkout');
