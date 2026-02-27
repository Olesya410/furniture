<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;


class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('auth.login');
        }

        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        $productsInCart = [];
        $total = 0;

        foreach ($cartItems as $item) {
            $product = $item->product;
            $product->quantity = $item->quantity;
            $product->total_price = $product->price * $product->quantity;
            $productsInCart[] = $product;
            $total += $product->total_price;
        }

        return view('cart.index', compact('productsInCart', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('auth.login');
        }

        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $productId)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('auth.login');
        }

        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }
}
