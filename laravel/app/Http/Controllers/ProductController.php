<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createAllProduct(){
        return view('product.products',[
            'products'=>[['product'=>'hallo'],['product'=>'hallo']]
        ]);
    }
}
