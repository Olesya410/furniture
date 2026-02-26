<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
        return view('order', compact('cartItems'));// путь к вашему Blade-шаблону
    }

    public function submit(Request $request)
    {

        // dd('Метод submit вызван');
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'selected_products' => 'required|array|min:1',
            'selected_products.*' => 'exists:products,id',
        ]);

        // Создаем заказ
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            // добавьте другие поля по необходимости
        ]);

        // Получаем выбранные товары из корзины
        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        foreach ($cartItems as $item) {
            if (in_array($item->product_id, $validated['selected_products'])) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
        }

        // Удаляем выбранные товары из корзины
        CartItem::where('user_id', Auth::id())
            ->whereIn('product_id', $validated['selected_products'])
            ->delete();

        return redirect()->route('order.success', ['order' => $order->id]);
    }

    public function success($orderId)
    {
        
        $order = Order::findOrFail($orderId);
        return view('success', compact('order'));
    }
}