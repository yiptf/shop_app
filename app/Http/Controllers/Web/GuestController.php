<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('guest.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('guest.show', compact('product'));
    }

}
