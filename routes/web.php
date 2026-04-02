<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.welcome');
});
Route::get('/login',[AuthController::class, 'login'])->name('posts.login');
Route::post('/login',[AuthController::class, 'loginCheck'])->name('posts.login');
Route::get('/register',[AuthController::class, 'register'])->name('posts.register');
Route::get('/user',[UserController::class, 'showArtwork'])->name('user.show');
Route::post('/register', [AuthController::class, 'store'])->name('posts.store');


Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/admin/purchases', [AdminController::class, 'viewPurchases'])->name('admin.purchases'); 

Route::get('/admin/{artwork}', [UserController::class, 'show'])->name('user.details');



Route::get('/admin/{artwork}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::put('/admin/{artwork}', [AdminController::class, 'update'])->name('admin.update');

Route::delete('/admin/{artwork}',[AdminController::class, 'destroy'])->name('admin.destroy');

Route::post('/buy-now/{artwork}', [UserController::class, 'buyNow'])->name('user.buyNow');

Route::delete('/cart/remove/{id}', [UserController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [UserController::class, 'checkout'])->name('cart.checkout');

Route::get('/cart', [UserController::class,'shopping'])->name('showCart');
Route::get('/admin/purchases', [AdminController::class, 'viewPurchases'])->name('admin.purchases');


Route::post('/user/order', [UserController::class,'store_order'])->name('user.storeOrder');
Route::get('/user/order', [UserController::class, 'showUserOrder'])->name('user.User_Oreder');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




