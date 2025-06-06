<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Public Routes - Không cần đăng nhập
|--------------------------------------------------------------------------
*/

// Trang chủ hiển thị sản phẩm, route tên products.indexPublic
Route::get('/', [ProductController::class, 'index'])->name('products.indexPublic');

// Trang danh sách sản phẩm và chi tiết sản phẩm (public)
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::get('/introduce', function () {
    return view('introduce');
})->name('introduce');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


/*
|--------------------------------------------------------------------------
| Routes yêu cầu đăng nhập
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Thông báo
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{id}/read', function ($id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect()->route('notifications.index');
    })->name('notifications.markAsRead');

    // Giỏ hàng
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');

    // Đăt hàng
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');
    Route::get('/checkout-success', [CheckoutController::class, 'success'])->name('checkout.success');


    // Trang home cho user đã đăng nhập
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');

    /*
    |--------------------------------------------------------------------------
    | Routes dành cho admin
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {

        // Dashboard admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Quản lý sản phẩm admin (CRUD đầy đủ)
        Route::resource('products', ProductController::class);

        // Quản lý danh mục (category)
        Route::resource('categories', CategoryController::class);

        // Quản lý đơn hàng admin
        Route::resource('orders', OrderController::class);
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (login, register, etc.)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
