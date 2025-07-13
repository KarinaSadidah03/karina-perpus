<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/books');
            }

            return redirect('/dashboard');
        }

        return $next($request);
    }
}
