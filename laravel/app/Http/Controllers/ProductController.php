<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createAllProduct()
    {
        // TODO: Get Products and pass them to View
        $products = Product::get();


        return view('product.products', [
            'products' => $products
        ]);
    }

    public function createOneProduct($productId)
    {
        $product = Product::find($productId);

        return view('product.product', [
            'product' => $product
        ]);
    }
}
