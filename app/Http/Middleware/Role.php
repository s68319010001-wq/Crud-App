<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // เช็กว่าไม่ได้ล็อกอิน หรือ Role ไม่ใช่ 1 (ไม่ใช่ Admin)
        if (!Auth::check() || Auth::user()->role != 1) {
            return redirect()->route('dashboard')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้า admin');
        }

        return $next($request);
    }
}