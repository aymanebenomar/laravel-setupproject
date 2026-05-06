<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDirecteur
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */



    public function handle(Request $request, Closure $next)
    {
        if(!auth() || auth()->user()->role !== 'directeur'){
            abort(403, 'Access Refuse');
        }
        return $next($request);
    }
}
