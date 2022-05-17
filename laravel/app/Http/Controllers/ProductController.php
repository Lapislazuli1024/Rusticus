<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function createAllProduct()
    {
        $products = Product::get();

        return view('farmer.product.products', [
            'products' => $products
        ]);
    }

    public function createOneProduct($productId)
    {
        if (Product::find($productId) == null) {
            return redirect('/');
        }

        $product = Product::find($productId);

        return view('farmer.product.product', [
            'product' => $product
        ]);
    }

    public function createAddProduct()
    {
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
        $userId = auth()->id();

        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect('/user/login');
        }

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

        return redirect()->route('farmersProducts', $userId);
    }

    public function createFarmerRelatedProduct($userId)
    {

        $products = Product::get()->where('user.id', $userId);

        return view('farmer.product.products', [
            'products' => $products
        ]);
    }

    public function createEditProduct($productId)
    {

        $userId = auth()->id();
        $user = User::find($userId);
        $product = Product::find($productId);
        $units = Unit_of_measure::get();
        $sub_categories = Sub_category::get();

        if ($user->farmer != null && $product != null) {
            if ($product->user_id == $userId) {
                return view('farmer.product.editProduct', ['user' => $user, 'units' => $units, 'sub_categories' => $sub_categories, 'product' => $product]);
            }
        }
        return redirect('/');
    }

    public function storeEditProduct(Request $request)
    {
        $userId = auth()->id();

        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect(route('create.login'));
        }

        $productData = $request->validate([
            'productId' => [],
            'productname' => ['alpha', 'min:3', 'max:255'],
            'stock_quantity' => ['numeric'],
            'description' => ['max:1000'],
            'product_hint' => ['in:vegan,vegetarian,neither'],
            'price' => ['numeric'],
            'product_image' => ['image'],
            'unit_of_measure' => ['exists:App\Models\Unit_of_measure,id'],
            'sub_category' => ['exists:App\Models\Sub_category,id'],
        ]);

        $imagePath = Product::find($productData['productId'])->image;
        if (isset($productData['product_image'])) {
            $path = 'pictures/products';
            $imagePath = Storage::disk('public')->put($path, $productData['product_image']);
        }

        Product::updateOrCreate(
            [
                'id' => $productData['productId'],
            ],
            [
                'name' => $productData['productname'],
                'stock_quantity' => $productData['stock_quantity'],
                'description' => $productData['description'],
                'product_hint' => $productData['product_hint'],
                'image' => $imagePath,
                'price' => $productData['price'],
                'user_id' => $user->id,
                'sub_category_id' => $productData['sub_category'],
                'unit_of_measure_id' => $productData['unit_of_measure']
            ]
        );
        return redirect()->route('farmersProducts', $userId);
    }

    public function storeRemoveProduct($productId)
    {
        $userId = auth()->id();
        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect('/user/login');
        }

        $product = Product::find($productId);

        if ($product == null) {
            return redirect('/');
        }
        if ($product->user_id == $userId) {
            $product->delete();
        }
        return redirect('/');
    }
}
