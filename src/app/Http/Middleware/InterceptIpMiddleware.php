<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InterceptIpMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $ip = ['ip' => $request->ip()];
        $request->merge($ip);

        return $next($request);
    }
}
