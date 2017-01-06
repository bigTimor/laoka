<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(!empty($_COOKIE['user']) && json_decode($_COOKIE['user'])->u_id){
            return $next($request);
        }
        return redirect()->guest('login');
    }
}
