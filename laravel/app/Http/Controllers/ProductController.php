<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;

class ProductController extends Controller
{
    public function createAllProduct()
    {
        // TODO: Get Products and pass them to View
        $products = Product::get();

        return view('farmer.product.products', [
            'products' => $products
        ]);
    }

    public function createOneProduct($productId)
    {
        $product = Product::find($productId);

        return view('farmer.product.product', [
            'product' => $product
        ]);
    }

    public function createAddProduct()
    {
        // TODO: Check if user is allowed to create Product (user == farmer)
        // then if true, show form to register Product
        // else throw error message 
        $userId = auth()->id();
        $user = User::find($userId);
        $units = Unit_of_measure::get();
        $sub_categories = Sub_category::get();

        if ($user->farmer != null) {
            return view('farmer.product.addProduct', ['user' => $user, 'units' => $units, 'sub_categories' => $sub_categories]);
        }
        return redirect('/');
    }

    public function storeAddProduct(Request $request)
    {
        // TODO: read Product data form Form and insert into DB
        $productData = $request->validate([
            'productname' => ['required', 'alpha', 'min:3', 'max:255'],
            'stock_quantity' => ['required', 'numeric'],
            'description' => ['required', 'max:1000'],
            'product_hint' => ['required', 'in:vegan,vegetarian,neither'],
            'price' => ['required', 'numeric'],
            'product_image' => ['required', 'image'],
            'unit_of_measure' => ['exists:App\Models\Unit_of_measure,id'],
            'sub_category' => ['exists:App\Models\Sub_category,id'],
        ]);

        $userId = auth()->id();

        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect('/user/login'); // Fehlernachticht, das nicht als bauer angemeldet
        }

        $path = 'pictures/products';
        $imagePath = Storage::disk('public')->put($path, $request->product_image);

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

    public function createFarmerRelatedProduct($farmerId)
    {
        // TODO: Get farmer specific products and pass them to View
        $products = Product::get()->where('user.id', $farmerId);

        return view('farmer.product.products', [
            'products' => $products
        ]);
    }

    public function createEditProduct($productId)
    {
        // TODO: get te product willing to be edited and load edit form
        $userId = auth()->id();
        $user = User::find($userId);
        $product = Product::find($productId);
        $units = Unit_of_measure::get();
        $sub_categories = Sub_category::get();

        if ($user->farmer != null || $product == null) {
            if($product->user->id == $userId){
                return view('farmer.product.editProduct', ['user' => $user, 'units' => $units, 'sub_categories' => $sub_categories, 'product' => $product]);
            }
            // TODO: error message -> not product of user
        }
        return redirect('/');
    }

    public function storeEditProduct()
    {
        // TODO: read edited values form Form and update them
    }
}
