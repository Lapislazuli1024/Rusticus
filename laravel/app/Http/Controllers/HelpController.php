<?php

namespace App\Http\Controllers;

class HelpController extends Controller
{
    public function userHelp(){
        return view('user.help');
    }
}
