<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        // หากไม่ได้ล็อกอิน หรือไม่มีสิทธิ์ ให้ redirect
        return redirect()->route('home')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้า admin');
    }
}