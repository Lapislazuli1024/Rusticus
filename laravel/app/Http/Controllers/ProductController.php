<?php

namespace App\Http\Controllers;

use App\Models\Main_category;
use App\Models\Product;
use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use App\Models\User;
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

    public function createRegisterProduct()
    {
        // TODO: Check if user is allowed to create Product (user == farmer)
        // then if true, show form to register Product
        // else throw error message 
        $userId = 21; // user 21 is a farmer, everything lower isnt (DONT ASK ME WHY)
        $user = User::find($userId);
        $units = Unit_of_measure::get();
        $main_categories = Main_category::get();
        $sub_categories = null;

        if($user->farmer != null){
            return view('product.registerProduct', ['user' => $user, 'units' => $units, 'main_categories' => $main_categories, 'sub_categories' => $sub_categories]);
        }
        return redirect('/');
    }

    public function storeRegisterProduct()
    {
        // TODO: read Product data form Form and insert into DB
    }

    public function createEditProduct()
    {
        // TODO: get te product willing to be edited and load edit form
    }

    public function storeEditProduct()
    {
        // TODO: read edited values form Form and update them
    }
}
