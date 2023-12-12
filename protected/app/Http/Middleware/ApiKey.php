<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('C-API-KEY');

        if($apiKey !== config('app.api_key') && !empty($apiKey)):
            return response()->json(['error' => 'Invalid API key.'], 401);
        elseif(empty($apiKey) or $apiKey == null):
            return response()->json(['error' => 'Invalid API key.'], 401);
        endif;

        return $next($request);
    }
}
