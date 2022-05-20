<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    // Setting Functions


    public function createSettings()
    {
        $units = Unit_of_measure::get();
        $sub_categories = Sub_category::get();
        return view('user.settings.settings', ['user' => auth()->user(),'units' => $units, 'sub_categories' => $sub_categories]);
    }

    public function storeCustomersettings(Request $request)
    {

        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'username' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'email'],
        ]);

        Auth::user()->update([
            'surname' => $usrData['surname'],
            'name' => $usrData['name'],
            'email' => $usrData['email'],
        ]);

        Auth::user()->customer->update([
            'username' => $usrData['username'],
        ]);

        return $this->createSettings();
    }

    public function storeFarmerSettings(Request $request)
    {

        $usrData = $request->validate([
            'surname' => ['required', 'alpha', 'min:3', 'max:255'],
            'name' => ['required', 'alpha', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'street' => ['required'],
            'place' => ['required', 'alpha'],
            'postalcode' => ['required', 'numeric'],
        ]);

        Auth::user()->update([
            'surname' => $usrData['surname'],
            'name' => $usrData['name'],
            'email' => $usrData['email'],
        ]);

        Auth::user()->farmer->address->update([
            'street' => $usrData['street'],
        ]);

        Auth::user()->farmer->address->town->update([
            'name' => $usrData['place'],
            'postal_code' => $usrData['postalcode'],
        ]);

        return $this->createSettings();
    }

    public function storePwSettings(Request $request)
    {
        $usrData = $request->validate([
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'min:6', 'max:255'],
        ]);

        if ($usrData['password'] === $usrData['password_confirmation']) {
            Auth::user()->update([
                'password' => $usrData['password'],
            ]);
        } else {
            session()->flash('pwd_change', 'Die Passwörter stimmen nicht überein!');
            return back()->withInput();
        }

        return $this->createSettings();
    }
}
