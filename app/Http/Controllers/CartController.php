<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // ✅ ADD TO CART
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        

            session()->put('cart', $cart);

return redirect('/cart')->with('success', 'Added to cart');
    }

    // 🛒 VIEW CART
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // ❌ REMOVE ITEM
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    // 🧹 CLEAR CART
    public function clear()
    {
        session()->forget('cart');
        return back();
    }
}