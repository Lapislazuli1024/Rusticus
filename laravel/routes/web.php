<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FarmerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;

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

//Auth Routes
Route::get('register' ,[RegisterController::class, 'show'])->name('register');
Route::get('login',[LoginController::class,'show'])->name('login');
Route::post('auth/login',[LoginController::class,'auth'])->name('login.auth');
Route::post('auth/register',[RegisterController::class,'auth'])->name('register.auth');

//Farmer Routes
Route::get('bauern',[FarmerController::class,'showAll'])->name('farmers');
Route::get('bauer/{farmer:id}',[FarmerController::class,'show'])->name('farmer');

//Product Routes
Route::get('produkte',[ProductController::class,'showAll'])->name('products');

//Search
Route::post('/search',[SearchController::class,'index'])->name('search.results');
Route::post('/livesearch',[SearchController::class,'livesearch'])->name('livesearch');

//Cart
Route::get('cart',[CartController::class,'showCart'])->name('cart');
Route::get('addtocart/{product:id}', [CartController::class,'addToCart'])->name('addtocart');

//Reservation
Route::get('reservation',[ReservationController::class,'showReservation'])->name('reservation');
Route::get('checkout',[ReservationController::class,'checkout'])->name('checkout');
