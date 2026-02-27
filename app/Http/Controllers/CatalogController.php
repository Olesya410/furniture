<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Product;
// use App\Models\ProductСatalog;


class CatalogController extends Controller
{
    public function index()
    {
        $products = Catalog::with('products')->get(); 
        return view('catalog', compact('products'));
    }

    public function showCategories($id)
    {
        $category = Product::where('catalog_id', $id)->get(['id', 'img', 'img_name', 'price', 'price_old', 'product_size', 'description', 'name', 'catalog_id']);
        return view('category', compact('category'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }
}
