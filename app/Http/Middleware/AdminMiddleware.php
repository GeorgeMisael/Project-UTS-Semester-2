<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $superAdmin = 1;
        $admin = 2;

        if ($request->user()->id_jenis_user == $admin || $request->user()->id_jenis_user == $superAdmin) {
            return $next($request);
        }
        
        abort(401);
    }
}
