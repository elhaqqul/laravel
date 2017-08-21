<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Session;
class Loginauth
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
        if(Session::has('username') == ""){
            return redirect('loginform');
        }
        return $next($request);
    }
}
