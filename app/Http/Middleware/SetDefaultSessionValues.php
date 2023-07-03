<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class SetDefaultSessionValues
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('locale') ) {
            // Set your default session values here
            Session::put('locale', 'fr');
            
        }if(!Session::has("currency")){
            Session::put("currency","MAD");
        }

        return $next($request);
    }
}
