<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function createAllFarmer(){
        return view('farmer.farmers',['farmers'=>[['name'=>'Hallo'],['name'=>'Hallo']]]);

    }
    public function createOneFarmer($id){
        return view('farmer.farmer',['id'=>$id]);
    }
}
