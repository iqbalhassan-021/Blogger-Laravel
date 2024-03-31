<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class ClearSessionOnClose
{
    public function handle($request, Closure $next)
    {
        // Check if session has expired
        if (Session::has('user') && !Session::exists('user')) {
            Session::forget('user'); // Clear the session value
        }

        return $next($request);
    }
}
