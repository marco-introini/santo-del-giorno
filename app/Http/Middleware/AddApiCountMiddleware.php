<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddApiCountMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $user->increment('api_count');
        $user->save();

        return $next($request);
    }
}
