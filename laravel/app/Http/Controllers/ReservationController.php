<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Reservation_has_product;
use App\Models\Session_has_product;
use App\Models\Sessioncart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function createReservation()
    {
        $userId = auth()->id();
        if (Reservation::where('user_id', '=', $userId)->first() != null) {
            $reservationProducts = Reservation::where('user_id', '=', $userId)->get();
            return view('reservation.reservation', ['reservationProducts' => $reservationProducts]);
        }
        return view('reservation.reservation', ['reservationProducts' => null]);
    }

    public function storeCheckout()
    {
        // 
        $userId = auth()->id();
        $confirmed = false; // TODO: get confirmed somehow

        $sessioncart = $this->getSessionCart();

        if ($sessioncart === null) {
            // Throw Error because there is no session cart
            return $this->createReservation();
        }

        $sessionHasProducts = $sessioncart->session_has_product()->get();


        // $reservation = $this->getReservation();
        // if ($reservation === null) {
        $reservation = Reservation::create([
            'user_id' => $userId,
            'confirmation' => $confirmed,
        ]);
        // }

        // dd($sessionHasProducts);
        foreach ($sessionHasProducts as $product) {
            Reservation_has_product::create([
                'amount' => $product->amount,
                'pickup_date' => date('Y-m-d'),
                'product_id' => $product->id,
                'reservation_id' => $reservation->id,
            ]);
        }

        $sessioncart->delete();

        return $this->createReservation();
    }

    private function getSessionCart()
    {
        $userId = auth()->id();
        return Sessioncart::where('user_id', '=', $userId)->first();
    }

    private function getReservation()
    {
        $userId = auth()->id();
        return Reservation::where('user_id', '=', $userId)->first();
    }
}
