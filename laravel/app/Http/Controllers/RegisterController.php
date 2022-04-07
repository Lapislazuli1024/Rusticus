<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.form');
    }
    
    public function store(Request $request)
    {
        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'alpha'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        User::create([
            'surname' => $usrData['surname'],
            'name' => $usrData['name'],
            'email' => $usrData['email'],
            'password' => $usrData['password'],
        ]);
    }
}
