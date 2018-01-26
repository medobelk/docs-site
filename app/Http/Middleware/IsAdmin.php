<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if( !Auth::user() ){
            return redirect('login');
        }
        if( Auth::user()->role()->first()->name !== 'doctor' ){
            return redirect('cabinet');
        }
        return $next($request);
    }
}