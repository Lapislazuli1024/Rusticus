<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createLogin()
    {
        return view('auth.login.form');
    }


    public function storeLogin(Request $request)
    {

        $attributes = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/');
        }

        session()->flash('login_error', 'Die E-Mail und das Passwort stimmen nicht überein!');
        return back();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function createSettings()
    {
        $user = User::find(auth()->id());
        return view('user.settings.settings', ['user' => $user]);
    }


    public function storeFarmerSettings(Request $request)
    {

        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'street' => ['required'],
            'place' => ['required', 'alpha'],
            'postalcode' => ['required', 'numeric'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        return view('user.settings.settings');


        /*
        User::updateOrCreate(
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
        */
    }

    public function storeCustomersettings(Request $request)
    {

        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'username' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        return view('user.settings.settings');


        /*
        User::updateOrCreate(
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
        */
    }
}
