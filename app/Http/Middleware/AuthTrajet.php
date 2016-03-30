<?php

namespace App\Http\Middleware;

use Closure;

class AuthTrajet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session(['details'=>$request->all()]);
        return $next($request);
    }
}
