<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guarantees;
use App\Models\ProductReturn;


class DeliveryController extends Controller
{
    public function index()
    {
        $garantees = Guarantees::all();
        $product_return = ProductReturn::all();
        return view('guarantees', [
            'garantees'=> $garantees,
            'product_return' => $product_return,
        ]);

    }
}
