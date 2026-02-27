<?php
namespace App\Http\Controllers;

use App\Models\Productcatalog;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductcatalogController extends Controller
{
    public function index($catalog_id)
    {
        $products = Productcatalog::where('catalog_id', $catalog_id)->get();
        return view('catalog', compact('products'));
    }

    public function createProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|max:2048', 
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $filename = basename($path);
        } else {
            $filename = null;
        }

        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'img' => $filename,
        ]);

        return redirect()->back()->with('success', 'Товар успешно добавлен');
    }
}

