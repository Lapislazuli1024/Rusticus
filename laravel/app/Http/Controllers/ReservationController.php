<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function createReservation()
    {
        $userId = 1; // TODO: get userid
        if (Reservation::where('user_id', '=', $userId)->first()) {
            $reservationProducts = Reservation::where('user_id', '=', $userId)->first()->reservation_has_product()->get();
            return view('reservation.reservation', ['reservationProducts' => $reservationProducts]);
        }
        return view('reservation.reservation');
    }

    public function storeCheckout()
    {
    }
}
