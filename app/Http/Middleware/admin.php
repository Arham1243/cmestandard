<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class admin
{

    public function handle(Request $request, Closure $next)
    {
        if( ! auth('admin')->user()){
            return redirect()->route('admin.login')->with('notify_error','You need to login before accessing Admin Dashboard');
        } else {
            return $next($request);
        }
        
        // if(is_admin()){
        //     return $next($request);
        // } else {
        //     return redirect()->route('admin.login')->with('notify_error','You need to login before accessing Admin Dashboard');
        // }
    }

}
