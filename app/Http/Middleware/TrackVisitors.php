<?php

namespace App\Http\Middleware;

use Closure; // Tambahkan impor ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackVisitors
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
        if (!Session::has('visitors')) {
            Session::put('visitors', 1);
        } else {
            Session::put('visitors', Session::get('visitors') + 1);
        }

        
        return $next($request);
    }
}
