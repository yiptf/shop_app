<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('user.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.show', compact('product'));
    }

    public function showCart()
    {
        if(!Session::get('cart'))
        {
            return view('user.show-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        return view('user.show-cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice,
        'totalQty'=>$cart->totalQty]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $qty = $request->input('quantity');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $qty);

        $request->session()->put('cart', $cart);
        
        return redirect()->route('user.all.products');
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);

        $request->session()->put('cart', $cart);

        if(Session::get('cart')->totalQty == 0)
        {
            Session::forget('cart');
        }
        
        return redirect()->route('user.show.cart');
    }
}
