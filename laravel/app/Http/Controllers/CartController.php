<?php

namespace App\Http\Controllers;

use App\Models\Session_has_product;
use App\Models\Sessioncart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function createCart()
    {
        $userId = 1; // TODO: get userid
        $sessioncart = Sessioncart::where('user_id', '=', $userId)->first();

        if ($sessioncart == null) {
            return redirect('/');
        }

        $sessionProducts = Sessioncart::where('user_id', '=', $userId)->first()->session_has_product()->get();
        return view('cart.cart', ['sessionProducts' => $sessionProducts]);
    }

    public function storeCartIncrement($productId)
    {
        $sessionProduct = Session_has_product::where('sessioncart_id', '=', $this->getSessionCart()->id)->where('product_id', '=', $productId)
            ->first();

        if ($sessionProduct != null) {
            $sessionProduct->increment('amount', 1);
        }

        return $this->createCart();
    }

    public function storeCartDecrement($productId)
    {
        $sessionProduct = Session_has_product::where('sessioncart_id', '=', $this->getSessionCart()->id)->where('product_id', '=', $productId)
            ->first();

        if ($sessionProduct != null) {
            if ($sessionProduct->amount > 0) {
                $sessionProduct->decrement('amount', 1);
            }

            if ($sessionProduct->amount == 0) {
                $this->storeCartRemove($productId);
            }
        }

        return $this->createCart();
    }

    public function storeCartRemove($productId)
    {
        $sessionProduct = Session_has_product::where('sessioncart_id', '=', $this->getSessionCart()->id)->where('product_id', '=', $productId)
            ->first();

        if ($sessionProduct != null) {
            $sessionProduct->delete();
        }

        return $this->createCart();
    }

    public function storeCartAdd($productId)
    {
        // Add Product to DB
        $userId = 1; // TODO: get userid form Data

        $sessioncart = $this->getSessionCart();
        if ($sessioncart === null) {
            // Create Sessioncart and save it
            $sessioncart = Sessioncart::create([
                'user_id' => $userId,
            ]);
        }

        if (Session_has_product::where('sessioncart_id', '=', $sessioncart->id)->where('product_id', '=', $productId)->first() === null) {
            // Create Session_has_Product and save it
            Session_has_product::create([
                'amount' => 1,
                'product_id' => $productId,
                'sessioncart_id' => $sessioncart->id,
            ]);
        }
        return redirect('/');
    }

    private function getSessionCart()
    {
        $userId = 1; // TODO: get userid form Data
        return Sessioncart::where('user_id', '=', $userId)->first();
    }
}
