<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Farmer;
use App\Models\Town;
use App\Models\User;
use App\Models\Webpage;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.form');
    }

    public function storeCustomer(Request $request)
    {
        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'username' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        if ($usrData['password'] === $usrData['password_confirmation']) {

            $user = User::create([
                'surname' => $usrData['surname'],
                'name' => $usrData['name'],
                'email' => $usrData['email'],
                'password' => $usrData['password'],
            ]);

            Customer::create([
                'user_id' =>  $user->id,
                'username' => $usrData['username'],
            ]);

            auth()->login($user);
        } else {
            session()->flash('pwd_customer', 'Die Passwörter stimmen nicht überein!');
            return back()->withInput();
        }

        return redirect('/')->with('acc_created', 'Dein Account wurde erstellt!');
    }

    public function storeFarmer(Request $request)
    {
        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'username' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'street' => ['required'],
            'place' => ['required', 'alpha'],
            'postalcode' => ['required', 'numeric'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);


        if ($usrData['password'] === $usrData['password_confirmation']) {

            $user = User::create([
                'surname' => $usrData['surname'],
                'name' => $usrData['name'],
                'email' => $usrData['email'],
                'password' => $usrData['password'],
            ]);

            $town = Town::create([
                'name' => $usrData['place'],
                'postal_code' => $usrData['postalcode'],
            ]);

            $address = Address::create([
                'street' => $usrData['street'],
                'town_id' => $town->id,
            ]);

            $webpage = Webpage::create([
                'image' => 'dummy.jpg', //Change to actual Placeholder
                'title' => 'Webseite von' . $usrData['name'] . " " . $usrData['surname'],
                'description' => 'Platz für ein neuer Anfang',
                'webpage_url' => 'http://www.ggasparri.net',
            ]);

            Farmer::create([
                'user_id' =>  $user->id,
                'address_id' => $address->id,
                'webpage_id' => $webpage->id,
            ]);

            auth()->login($user);
            
        } else {
            session()->flash('pwd_farmer', 'Die Passwörter stimmen nicht überein!');
            return back()->withInput();
        }

        return redirect('/');
    }
}
