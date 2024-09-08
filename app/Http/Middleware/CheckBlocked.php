<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_active == 0)
        {
            $message = 'You Are Restricted To Access Your Account. Please contact Administrator!';
            auth()->logout();
            return redirect()->route('home')->with('notify_error',$message);
        }
        return $next($request);
    }
}