<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

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
        $sub_categories = Sub_category::get();

        if ($user->farmer != null) {
            return view('product.registerProduct', ['user' => $user, 'units' => $units, 'sub_categories' => $sub_categories]);
        }
        return redirect('/');
    }

    public function storeRegisterProduct(Request $request)
    {
        // TODO: read Product data form Form and insert into DB
        $productData = $request->validate([
            'productname' => ['required', 'alpha', 'min:3', 'max:255'],
            'stock_quantity' => ['required', 'numeric'],
            'description' => ['required', 'max:1000'],
            'product_hint' => ['required', 'in:vegan,vegetarian,neither'],
            'price' => ['required', 'numeric'],
            'product_image' => [],
            'unit_of_measure' => ['exists:App\Models\Unit_of_measure,id'],
            'sub_category' => ['exists:App\Models\Sub_category,id'],
        ]);

        $userId = 21; // Get Userid

        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect('/user/login'); // Fehlernachticht, das nicht als bauer angemeldet
        }

        $imagePath = '/pictures/products/product1.png';
        if ($productData['product_image'] != null) {
            $imagePath = $productData['product_image'];
        }

        Product::create([
            'name' => $productData['productname'],
            'stock_quantity' => $productData['stock_quantity'],
            'description' => $productData['description'],
            'product_hint' => $productData['product_hint'],
            'image' => $imagePath,
            'price' => $productData['price'],
            'user_id' => $user->id,
            'sub_category_id' => $productData['sub_category'],
            'unit_of_measure_id' => $productData['unit_of_measure']
        ]);

        return redirect('/');
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
