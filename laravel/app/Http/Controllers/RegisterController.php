<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        
        if($usrData['password'] === $usrData['password_confirmation']){

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

        }
        else{
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
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        
        if($usrData['password'] === $usrData['password_confirmation']){
            
            //dd($usrData);

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

        }
        else{
            session()->flash('pwd_customer', 'Die Passwörter stimmen nicht überein!');
            return back()->withInput();
        }


        return redirect('/');
    }
}
