<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [ProductController::class, 'product']);
Route::get('/stocks', function () {
    return view('akc');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/delivery', function () {
    return view('delivery');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/kabinet', [HomeController::class, 'kabinet']);
Route::get('/admin', [HomeController::class, 'admin']);
Route::get('/katalog', [TovarController::class, 'katalog']);
Route::get('/katalog/kategory/{id}', [TovarController::class, 'categorytov']);
Route::get('/katalog/{id}', [TovarController::class, 'singleTov']);

/* Редактирование товаров, категорий, заявок */
Route::get('/admin/tovar/edit/{id}', [TovarController::class, 'formEdit'])->middleware('auth');
Route::post('/admin/tovar/edit/{id}/editSave', [TovarController::class, 'editSave']);

Route::get('/admin/category/edit/{id}', [HomeController::class, 'formCategEdit'])->middleware('auth');
Route::post('/admin/category/edit/{id}/editCategSave', [HomeController::class, 'editCategSave']);

Route::get('/admin/order/edit/{id}', [HomeController::class, 'formOrderEdit']);
Route::post('/admin/order/edit/{id}/editOrderSave', [HomeController::class, 'editOrderSave']);


/* Добавление товара, категории */
Route::get('/admin/tovar/add', [TovarController::class, 'addTovarForm']);
Route::post('/admin/tovar/add/addTovarSave', [TovarController::class, 'addTovarSave']);

Route::get('/admin/category/add', [HomeController::class, 'addCategForm']);
Route::post('/admin/category/add/addCategSave', [HomeController::class, 'addCategSave']);

/* Удаление */
Route::get('/admin/tovar/delete/{id}', [TovarController::class, 'delTovar']);
Route::get('/admin/category/delete/{id}', [HomeController::class, 'delCateg']);
Route::get('/admin/order/delete/{id}', [HomeController::class, 'delOrder']);

/* Корзина */
Route::get('/cart', [CartController::class, 'cartShow'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/{product}', [CartController::class, 'deleteFromCart'])->name('cart.delete');

/* Заказы */
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');