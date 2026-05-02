<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| SHOP
|--------------------------------------------------------------------------
*/
Route::get('/shop', function () {
    $products = Product::latest()->get();
    return view('shop', compact('products'));
});

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // ✅ DASHBOARD
    Route::get('/', function () {
        return view('admin.dashboard', [
            'orders' => Order::latest()->take(5)->get(),
            'totalOrders' => Order::count(),
            'totalProducts' => Product::count(),
            'totalUsers' => User::count(),
            'totalContacts' => Contact::count(),
            'revenue' => Order::sum('total')
        ]);
    })->name('admin.dashboard');

    // =========================
    // 📦 PRODUCTS
    // =========================
    Route::get('products/data', [ProductController::class, 'data'])->name('products.data');
    Route::resource('products', ProductController::class);

    // =========================
    // 📦 ORDERS
    // =========================
    Route::get('orders', function () {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    })->name('admin.orders');

    // ✅ ORDER STATUS UPDATE (IMPORTANT)
    Route::post('order/status/{id}', function ($id) {

        $order = Order::findOrFail($id);
        $order->status = request('status');
        $order->save();

        return back()->with('success', 'Order status updated!');

    })->name('admin.order.status');

    // =========================
    // 👤 USERS
    // =========================
    Route::get('users', function () {
        $users = User::all();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    // =========================
    // 📩 CONTACT
    // =========================
    Route::get('contact', [ContactController::class, 'index'])->name('admin.contact');

    Route::get('contact/edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');

    Route::post('contact/update/{id}', [ContactController::class, 'update'])->name('admin.contact.update');

    Route::get('contact/delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
});

/*
|--------------------------------------------------------------------------
| CART + CHECKOUT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // 🛒 CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // 💳 CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/place', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
});