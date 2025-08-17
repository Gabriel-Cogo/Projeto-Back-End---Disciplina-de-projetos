<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestResponse
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('API REQUEST', [
            'method' => $request->method(),
            'path'   => $request->path(),
            'ip'     => $request->ip(),
            'user'   => optional($request->user())->id,
            'body'   => $request->except(['password','password_confirmation']),
        ]);

        $response = $next($request);

        Log::info('API RESPONSE', [
            'status' => $response->getStatusCode(),
        ]);

        return $response;
    }
}
