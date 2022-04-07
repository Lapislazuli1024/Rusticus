<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('login.form');
    }


    public function store(Request $request)
    {
        
        $attributes = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/');
        }

        Farmer::find(1);

        return redirect('/login');
    }

    public function destroy()
    {

        //auth()->logout();

        return redirect('/');
    }
}