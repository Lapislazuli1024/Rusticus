<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Session_has_product;
use App\Models\Sessioncart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function createReservation()
    {
        $userId = 1; // TODO: get userid
        if (Reservation::where('user_id', '=', $userId)->first() != null) {
            $reservationProducts = Reservation::where('user_id', '=', $userId)->first()->reservation_has_product()->get();
            return view('reservation.reservation', ['reservationProducts' => $reservationProducts]);
        }
        return view('reservation.reservation', ['reservationProducts' => null]);
    }

    public function storeCheckout()
    {
        // 
        $userId = 1; // TODO: Get userId

        $sessioncart = $this->getSessionCart();

        if ($sessioncart === null) {
            // Throw Error because there is no session cart
        }

        $sessionHasProducts = $sessioncart->session_has_product()->get();
        dd($sessionHasProducts);
        foreach($sessionHasProducts as $product){
            
        }

        // if (Session_has_product::where('sessioncart_id', '=', $sessioncart->id)->where('product_id', '=', $productId)->first() === null) {
        //     // Create Session_has_Product and save it
        //     Session_has_product::create([
        //         'amount' => 1,
        //         'product_id' => $productId,
        //         'sessioncart_id' => $sessioncart->id,
        //     ]);
        // } else {
        //     return redirect("/cart/show");
        // }
        return Redirect::back();
    }

    private function getSessionCart()
    {
        $userId = 1; // TODO: get userid form Data
        return Sessioncart::where('user_id', '=', $userId)->first();
    }
}
