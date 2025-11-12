<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Fontos, hogy ez itt legyen!
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
        // 1. Ellenőrizzük, hogy be van-e jelentkezve ÉS a szerepköre 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            // 2. Ha igen, engedjük tovább a kérést
            return $next($request);
        }

        // 3. Ha nem, kidobjuk "403 - Tiltott" hibával
        abort(403, 'Hozzáférés megtagadva');
    }
}