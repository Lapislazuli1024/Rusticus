<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Session_has_product;
use App\Models\Sessioncart;
use App\Models\User;
use Hamcrest\Type\IsNumeric;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function createCart()
    {
        $userId = auth()->id();
        // $sessioncart = $this->getSessionCart();
        $totalItems = 0;
        $totalPrice = 0;

        // if ($sessioncart == null) {
        //     return redirect('/');
        // }

        $sessionProducts = Sessioncart::where('user_id', '=', $userId)->first()->session_has_product()->get();

        // Get total sum of Products
        foreach ($sessionProducts as $sessionProduct) {
            $totalItems += $sessionProduct->amount;
            $totalPrice += $sessionProduct->amount * $sessionProduct->product->price;
        }

        return view('cart.cart', ['sessionProducts' => $sessionProducts, 'totalItems' => $totalItems, 'totalPrice' => $totalPrice]);
    }

    public function storeCartIncrement($productId)
    {
        $sessionProduct = Session_has_product::where('sessioncart_id', '=', $this->getSessionCart()->id)
            ->where('product_id', '=', $productId)
            ->first();

        if ($sessionProduct != null) {
            $sessionProduct->increment('amount', 1);
        }

        return $this->createCart();
    }

    public function storeCartDecrement($productId)
    {
        $sessionProduct = Session_has_product::where('sessioncart_id', '=', $this->getSessionCart()->id)
            ->where('product_id', '=', $productId)
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
        // Trim input from user
        $productId = trim($productId, " \t\n\r");

        // Validate if ProductId is number and in DB
        if (is_numeric($productId) == false || Product::find($productId) == null) {
            return Redirect::back()->with('error', 'Dieses Produkt scheint nicht in der Datenbank vorhanden.');
        }

        // Add Product to DB
        $userId = auth()->id();

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
        return $this->createCart();
    }

    private function getSessionCart()
    {
        $userId = auth()->id();
        return Sessioncart::where('user_id', '=', $userId)->first();
    }
}
