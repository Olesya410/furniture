<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Отображение административной панели
    public function index()
    {
        $TotalUsers = User::count();
        $TotalProducts = Product::count();
        $TotalOrders = Order::count();

        $orders = Order::with('orderItems')->get(); // Предполагается связь 'orderItems' в модели Order

        return view('admin.index', compact('TotalUsers', 'TotalProducts', 'TotalOrders', 'orders'));
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function showOrders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Создание продукта (форма)
    public function createProduct()
    {
        return view('admin.create'); // Создайте соответствующее представление
    }

    // Обработка сохранения нового продукта
    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|max:2048',
            'img_name' => 'required|string',
            'price_old' => 'required|numeric',
            'product_size' => 'required|string',
            'catalog_id' => 'required|integer',
        ]);

        // Обработка файла изображения
        $filename = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
        }

        // Создание нового продукта
        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'price' => $validatedData['price'],
            'img' => $filename,
            'img_name' => $validatedData['img_name'],
            'price_old' => $validatedData['price_old'],
            'product_size' => $validatedData['product_size'],
            'catalog_id' => $validatedData['catalog_id'],
        ]);

        return redirect()->back()->with('success', 'Товар успешно добавлен');
    }

    // Удаление продукта
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        // Удаление изображения из файловой системы
        if ($product->img && Storage::disk('public')->exists('photos/' . $product->img)) {
            Storage::disk('public')->delete('photos/' . $product->img);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Продукт успешно удален');
    }

    // Редактирование продукта

    public function createUser(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // предполагается подтверждение пароля
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->back()->with('success', 'Пользователь успешно создан');
    }

    // Удаление пользователя
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Пользователь успешно удален');
    }
    
}



