<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessLevelSkpd
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
        if (!$request->user()->skpd_id) {
            return response()->json(null, 401);
		}

        return $next($request);
    }
}
