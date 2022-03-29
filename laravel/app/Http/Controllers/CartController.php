<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        return view('cart.cart');
    }

    public function addToCart($id)
    {
        // Add Product to DB
        

        // 
        return view('cart.cart', ['productId' => $id]);
    }
}
