<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/user', [LoginController::class, 'user'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/category/{id}', [CatalogController::class, 'showCategories'])->name('category.show');
Route::get('/product/{id}', [CatalogController::class, 'show'])->name('product.show');

Route::get('/delivery', [DeliveryController::class, 'index'])->name('guarantees');
Route::get('/delivery_pay', function() {return view('delivery_pay'); })->name('delivery_pay');
Route::get('/installment', function() {return view('installment'); })->name('installment');

Route::get('/order', [OrderController::class, 'create'])->name('order');
Route::post('/order', [OrderController::class, 'submit'])->name('order.submit');
Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

// админ
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');

Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin.products');
Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('create.product');
Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('store.product');


Route::get('/orders', [AdminController::class, 'showOrders'])->name('admin.orders');

// Обработка создания
Route::post('users', [AdminController::class, 'createUser'])->name('create.user');
Route::post('products', [AdminController::class, 'createProduct'])->name('create.product');

// Удаление пользователя
Route::delete('user/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');

// Удаление товара
Route::delete('products/{id}', [AdminController::class, 'deleteProduct'])->name('delete.product');

});

