<?php

namespace App\Http\Middleware;

use Closure;

class SaturdayMiddleware
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
        $dayNumber = date('w');
        if ($dayNumber == 6) {
            abort(403);
        }
        return $next($request);
    }
}
