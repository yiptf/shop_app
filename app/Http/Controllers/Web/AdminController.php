<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();

        return view('admin.create', compact('product'));
    }

    public function store()
    {
        Product::create($this->validatedData());

        return redirect()->route('admin.all.products');
    }

    public function show(Product $product)
    {
        return view('admin.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.edit', compact('product'));
    }

    public function update(Product $product)
    {
        $product->update($this->validatedData());

        return redirect()->route('admin.show.product', [$product]);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.all.products');
    }

    protected function validatedData()
    {
        return request()->validate([
            'imagePath'=>'required',
            'name'=>'required',
            'price'=>'required'
        ]);
    }
}
