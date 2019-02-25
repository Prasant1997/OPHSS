<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class AdminMiddleware
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
//        DD(Auth::User()->load('roles')->roles->first()->id);
        if (Auth::check() && Auth::User()->load('roles')->roles->first()->id == '1'){
            return $next($request);
        }
        else
            return redirect('/');

//        if (Auth::check() && Auth::user()->type == 'admin'){
//            return $next($request);
//        }
//        else
//            return redirect('/');
    }
}
