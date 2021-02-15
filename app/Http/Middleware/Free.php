<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class Free
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
        if (Session::has('status_mitra')){
            if ((Session::get('status_mitra') == 'free') ){
                return $next($request);        
            }    
            return redirect()->back();
        }
        else {
            return redirect('/akun');
        }
    }
}
