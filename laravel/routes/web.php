<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FarmerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\CartController;
use App\Http\Controllers\HelpController;
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
// => Home
Route::get('/', function () {
    return view('welcome.welcome');
});

// => Authentication Routes
Route::middleware(['guest'])->group(function () {
    // => Register
    Route::get('/user/register', [RegisterController::class, 'create'])->name('create.register');
    Route::post('/user/registerCustomer', [RegisterController::class, 'storeCustomer'])->name('storeCustomer.register');
    Route::post('/user/registerFarmer', [RegisterController::class, 'storeFarmer'])->name('storeFarmer.register');
    // => Login/Session
    Route::get('/user/login', [SessionController::class, 'createLogin'])->name('create.login');
    Route::post('/user/login', [SessionController::class, 'storeLogin'])->name('store.login');
});
Route::middleware(['auth'])->group(function () {
    // => Account-Settings
    Route::get('/user/settings', [SessionController::class, 'createSettings'])->name('create.settings');
    Route::post('/user/settings/customer', [SessionController::class, 'storeCustomerSettings'])->name('storeCustomer.settings');
    Route::post('/user/settings/farmer', [SessionController::class, 'storeFarmerSettings'])->name('storeFarmer.settings');
    Route::post('/user/settings/pw', [SessionController::class, 'storePwSettings'])->name('storePW.settings');

    // => Logout
    Route::get('/user/logout', [SessionController::class, 'destroy'])->name('destroy.session');

    // => Help
    Route::get('/user/help', [HelpController::class, 'userHelp'])->name('create.help');
});

// => Farmer Routes
Route::get('/farmers', [FarmerController::class, 'createAllFarmer'])->name('farmers');
Route::get('/farmer/{farmer:id}', [FarmerController::class, 'createOneFarmer'])->name('farmer');

// => Product Routes
Route::get('/products', [ProductController::class, 'createAllProduct'])->name('products');
Route::get('/product/show/{product:id}', [ProductController::class, 'createOneProduct'])->name('product');
Route::get('/products/show/{farmer:id}', [ProductController::class, 'createFarmerRelatedProduct'])->name('farmersProducts');

Route::middleware(['isFarmer'])->group(function () {
    Route::get('/product/add', [ProductController::class, 'createAddProduct'])->name('create.product');
    Route::post('/product/add', [ProductController::class, 'storeAddProduct'])->name('store.product');
    Route::get('/product/edit/{product:id}', [ProductController::class, 'createEditProduct'])->name('create.product.edit');
    Route::post('/product/edit', [ProductController::class, 'storeEditProduct'])->name('store.product.edit');
    Route::get('/product/remove/{product:id}', [ProductController::class, 'storeRemoveProduct'])->name('store.product.remove');

    Route::get('/webpage/edit', [FarmerController::class, 'createEditWebpage'])->name('create.webpage.edit');
    Route::post('/webpage/edit', [FarmerController::class, 'storeEditWebpage'])->name('store.webpage.edit');
});

// => Search
Route::post('/search',[SearchController::class,'index'])->name('search.main.results');
Route::get('/search',[SearchController::class, 'index'])->name('search.filters.results');
Route::post('/livesearch',[SearchController::class, 'livesearch'])->name('livesearch');
Route::post('/search/filters',[SearchController::class, 'filter'])->name('filters');

Route::middleware(['auth'])->group(function () {
    // => Cart
    Route::get('/cart/show', [CartController::class, 'createCart'])->name('cart');
    Route::get('/cart/add/{product:id}', [CartController::class, 'storeCartAdd'])->name('addtocart');
    Route::get('/cart/remove/{product:id}', [CartController::class, 'storeCartRemove'])->name('removefromcart');
    Route::get('/cart/increment/{product:id}', [CartController::class, 'storeCartIncrement'])->name('incrementincart');
    Route::get('/cart/decrement/{product:id}', [CartController::class, 'storeCartDecrement'])->name('decrementincart');

    // => Reservation
    Route::get('/reservation/show', [ReservationController::class, 'createReservation'])->name('reservation');
    Route::get('/reservation/checkout', [ReservationController::class, 'storeCheckout'])->name('checkout');
});