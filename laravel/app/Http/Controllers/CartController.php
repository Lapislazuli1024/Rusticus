<?php

namespace App\Http\Controllers;

use App\Models\Session_has_product;
use App\Models\Sessioncart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $userId = 1; // TODO: get userid

        $sessionProducts = Sessioncart::where('user_id', '=', $userId)->first()->session_has_product()->get();
        return view('cart.cart', ['sessionProducts' => $sessionProducts]);
    }

    public function addToCart($productId)
    {
        // Add Product to DB
        $userId = 1; // TODO: get userid form Data
        $sessionProduct = null;
        $amount = 10; // TODO: get amount


        if (Sessioncart::where('user_id', '=', $userId)->first() === null) {
            // Create Sessioncart and save it
            Sessioncart::create([
                'user_id' => $userId,
            ]);
        }
        $sessioncart = Sessioncart::where('user_id', '=', $userId)->first();

        if (Session_has_product::where('sessioncart_id', '=', $sessioncart['id'])->where('product_id', '=', $productId)->first() === null) {
            // Create Session_has_Product and save it
            Session_has_product::create([
                'amount' => 0,
                'product_id' => $productId,
                'sessioncart_id' => $sessioncart->id,
            ]);
        }
        Session_has_product::where('sessioncart_id', '=', $sessioncart['id'])->where('product_id', '=', $productId)
            ->first()->increment('amount', $amount);
        return redirect('/');
    }
}
