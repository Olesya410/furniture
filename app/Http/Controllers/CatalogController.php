<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Product;
// use App\Models\ProductСatalog;


class CatalogController extends Controller
{
    // Метод общего списка товаров
    public function index()
    {
        $products = Catalog::with('products')->get(); // Предполагаем, что у каждой категории есть связанные товары
        return view('catalog', compact('products'));
    }

    // Товары по конкретной категории
    public function showCategories($id)
    {
        $category = Product::where('catalog_id', $id)->get(['id', 'img', 'img_name', 'price', 'price_old', 'product_size', 'description', 'name', 'catalog_id']);
        return view('category', compact('category'));
    }

    // Детали отдельного товара
    public function show($id)
    {
        $product = Product::findOrFail($id); // находим конкретный товар
        return view('product', compact('product'));
    }
}