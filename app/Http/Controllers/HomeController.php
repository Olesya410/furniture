<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner; 
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $blok_product_popular = Product::all(); 
        // dd($banners, $blok_product_popular);

        return view('home', [
            'banners' => $banners,
            'blok_product_popular' => $blok_product_popular,
        ]);
    }
}

