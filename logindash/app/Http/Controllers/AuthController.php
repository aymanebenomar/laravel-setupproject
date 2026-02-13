<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'invalid credentials. ',
        ]);
    }

    public function logout(Request $request)
    {
        // remove authenticated user
        Auth::logout();

        // destroy session
        $request->session()->invalidate();

        // new CSRF token
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}