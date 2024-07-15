<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class RequiresJsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->wantsJson()) {
            throw new NotAcceptableHttpException('Please request with HTTP Header Accept: application/json');
        }
        return $next($request);
    }
}
