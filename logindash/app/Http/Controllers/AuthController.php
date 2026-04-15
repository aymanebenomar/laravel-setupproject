<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {

            // store in session (KEY => VALUE)
            $request->session()->put('user_id', $user->id);
            $request->session()->put('name', $user->name);

            return redirect('/posts');
        }

        return "Login failed";
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}