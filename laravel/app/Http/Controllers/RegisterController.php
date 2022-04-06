<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.form');
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'surname'=>['alpha','required', 'unique:users,surname'],
            'name'=>['alpha','required','unique:users,name'],
            'email'=>['email','required', 'unique:users,email'],
            'password'=>['required','confirmed'],
            //'webpage'=> ['required_if:farmer,1']
        ]);
        if($validator->fails()){
            return redirect('/register')->withErrors($validator);
        }

    }
}
