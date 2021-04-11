<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkuser
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
        if($request->session()->get('name') == 'admin'){
            return redirect('/admin');
        }
        if($request->session()->get('email') == null){
            return redirect('/user/login');
        }
        return $next($request);
    }
}
