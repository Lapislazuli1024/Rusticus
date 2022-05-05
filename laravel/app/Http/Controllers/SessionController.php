<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login.form');
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

        session()->flash('login_error', 'Die E-Mail und das Passwort stimmen nicht überein!');
        return back();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
