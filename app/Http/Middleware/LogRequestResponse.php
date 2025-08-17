<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestResponse
{
    public function handle(Request $request, Closure $next)
    {
        $userId = optional($request->user())->id;

        Log::channel('requests')->info('API REQUEST', [
            'user_id' => $userId,
            'method'  => $request->method(),
            'path'    => $request->path(),
            'ip'      => $request->ip(),
            'payload' => $request->except(['password','password_confirmation']),
        ]);

        $response = $next($request);

        Log::channel('requests')->info('API RESPONSE', [
            'user_id'  => $userId,
            'status'   => $response->getStatusCode(),
            // Evita logar corpo inteiro por privacidade; só status é suficiente
        ]);

        return $response;
    }
}
