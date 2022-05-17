<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Session_has_product;
use App\Models\Sessioncart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function createCart()
    {
        $userId = auth()->id();
        $totalItems = 0;
        $totalPrice = 0;

        $sessionProducts = auth()->user()->sessioncart->session_has_product()->get();

        foreach ($sessionProducts as $sessionProduct) {
            $totalItems += $sessionProduct->amount;
            $totalPrice += $sessionProduct->amount * $sessionProduct->product->price;
        }

        return view('user.cart.cart', ['sessionProducts' => $sessionProducts, 'totalItems' => $totalItems, 'totalPrice' => $totalPrice]);
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
        $productId = trim($productId, " \t\n\r");

        if (is_numeric($productId) == false || Product::find($productId) == null) {
            return Redirect::back()->with('error', 'Dieses Produkt scheint nicht in der Datenbank vorhanden.');
        }

        $sessioncart = $this->getSessionCart();

        if (Session_has_product::where('sessioncart_id', '=', $sessioncart->id)->where('product_id', '=', $productId)->first() === null) {
            Session_has_product::create([
                'amount' => 1,
                'product_id' => $productId,
                'sessioncart_id' => $sessioncart->id,
            ]);
        } else {
            $this->storeCartIncrement($productId);
        }


        return $this->createCart();
    }

    private function getSessionCart()
    {
        $userId = auth()->id();
        return Sessioncart::where('user_id', '=', $userId)->first();
    }
}
