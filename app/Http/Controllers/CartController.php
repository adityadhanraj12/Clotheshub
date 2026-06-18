<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::findOrFail($request->product_id);
        $cart = Cart::where('product_id', $product->id)
            ->where(function ($q) {
                $q->where('user_id', auth()->id())
                    ->orWhere('session_id', session()->getId());
            })
            ->first();
        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'session_id' => session()->getId(),
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->back()
            ->with('success', 'Product added to cart!');
    }
    public function index()
    {
        $carts = Cart::with('product')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('session_id', session()->getId());
            })
            ->get();
        $subtotal = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->base_price;
        });
        return view('cart', compact('carts', 'subtotal'));
    }
    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

        return back()->with('success', 'Item removed from cart.');
    }
    public function update(Request $request)
    {
        foreach ($request->quantities as $cartId => $quantity) {
            $cart = Cart::find($cartId);
            if ($cart && $quantity > 0) {
                $cart->update([
                    'quantity' => $quantity
                ]);
            }
        }
        return back()->with('success', 'Cart updated successfully.');
    }
}