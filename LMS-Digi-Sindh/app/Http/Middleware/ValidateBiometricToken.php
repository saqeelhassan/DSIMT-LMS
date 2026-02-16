<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateBiometricToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken()
            ?? $request->header('X-Biometric-Token')
            ?? $request->input('api_token');

        $expected = config('services.biometric.token') ?? env('BIOMETRIC_API_TOKEN');

        if (! $expected || $token !== $expected) {
            return response()->json(['success' => false, 'message' => 'Invalid or missing API token.'], 401);
        }

        return $next($request);
    }
}
