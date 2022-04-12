<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\User;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function createAllFarmer(){
        $farmers = Farmer::get();

        return view('farmer.farmers',['farmers' => $farmers]);

    }
    public function createOneFarmer($id){
        // TODO: get Farmer id From DB and pass to plade
        $farmer = User::find($id);


        // dd($farmer);
        return view('farmer.farmer',['user'=>$farmer]);
    }
}
