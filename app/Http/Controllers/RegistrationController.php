<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'username'     => 'required',
            'password'  => 'required|min:6'
        ]);
        dd($validator);
        // if (Auth::attempt($validator)) {

        //     // return redirect()->route('home');
        // }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }

}
