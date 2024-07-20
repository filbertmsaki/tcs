<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('Authorization');
        if ($apiKey !== 'Api-Key eybz6lMSYjvan5XcxJKOaV73MTSgDO5zka1xIFcfx04=') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
