<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('user_id')) {
            return redirect()->route('posts.index');
        }

        return $next($request);
    }
}