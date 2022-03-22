<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function showAll(){
        return view('farmer.farmers',['farmers'=>[['name'=>'Hallo'],['name'=>'Hallo']]]);

    }
    public function show($id){
        return view('farmer.farmer');
    }
}
