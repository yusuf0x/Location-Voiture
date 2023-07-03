<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyMiddleware
{
    public function handle($request, Closure $next)
    {
        $currency = $request->query('currency');

        if ($currency) {
            session(['currency' => $currency]);
        }

        return $next($request);
    }
}
