<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if (Session::has('level_akses')){
            if ((Session::get('level_akses') == 'admin') ){
                return $next($request);        
            }    
            return redirect()->back();
        }
        else {
            return redirect('/admin');
        }
    }
}
