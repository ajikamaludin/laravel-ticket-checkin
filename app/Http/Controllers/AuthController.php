<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // form_login, form
    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // #1 check
        // dd($request->input());

        // #2 validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // #3 login attemp
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect("login")->with('message', 'Login details are not valid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //public function register()
}
