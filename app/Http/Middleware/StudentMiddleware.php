<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

use Auth;

class StudentMiddleware
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
        if (Auth::check() && Auth::User()->load('roles')->roles->first()->id == '3'){
            return $next($request);
        }
        else
            return redirect('/');
    }
}
