<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reservation;
use App\Models\Reservation_has_product;
use App\Models\Sessioncart;

class ReservationController extends Controller
{
    public function createReservation()
    {
        $userId = auth()->id();
        if (Reservation::where('user_id', '=', $userId)->first() != null) {
            $reservationProducts = Reservation::where('user_id', '=', $userId)->get();
            return view('user.reservation.reservation', ['reservationProducts' => $reservationProducts]);
        }
        return view('user.reservation.reservation', ['reservationProducts' => null]);
    }

    public function storeCheckout()
    {
        if ($this->getSessionCart()->session_has_product()->first() == null) {
            return back();
        }
        $userId = auth()->id();
        $confirmed = false;
        $sessioncart = $this->getSessionCart();
        $sessionHasProducts = $sessioncart->session_has_product()->get();

        $reservation = Reservation::create([
            'user_id' => $userId,
            'confirmation' => $confirmed,
        ]);

        foreach ($sessionHasProducts as $sessionProduct) {
            $product = Product::find($sessionProduct->product_id);
            if ($product->stock_quantity < $sessionProduct->amount) {
                $sessionProduct->amount = $product->stock_quantity;
            }
            Reservation_has_product::create([
                'amount' => $sessionProduct->amount,
                'pickup_date' => date('Y-m-d'),
                'product_id' => $sessionProduct->product_id,
                'reservation_id' => $reservation->id,
            ]);
            $product->decrement('stock_quantity', $sessionProduct->amount);
            $sessionProduct->delete();
        }

        return $this->createReservation();
    }

    private function getSessionCart()
    {
        $userId = auth()->id();
        return Sessioncart::where('user_id', '=', $userId)->first();
    }
}
