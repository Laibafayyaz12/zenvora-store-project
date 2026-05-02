<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // 🧾 Checkout Page
  public function index()
{
    $cart = session()->get('cart', []);

    $total = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    return view('checkout', compact('cart', 'total'));
}
    

    // 💳 Place Order
    public function placeOrder(Request $request)
    {
        $cart = session('cart');

        // ❌ agar cart empty ho
        if (!$cart || count($cart) == 0) {
            return redirect('/cart')->with('error', 'Cart is empty');
        }

        $total = 0;

        // 💰 total calculate
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 🧾 order create
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // 📦 order items save
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // 🧹 cart clear
        session()->forget('cart');

        // ✅ success redirect
     return redirect('/shop')->with('success', 'Order successfully placed! Thank you 🎉');
    }
}