<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientSecretMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //get cred from header
        $credentials = explode(':', base64_decode(substr($request->header('Authorization'), 6)));
        $clientId = $credentials[0];
        $clientSecret = $credentials[1];

        // cred checking
        $validClientId = '76FD2153EFB37';
        $validClientSecret = 'E4gWSjezm67vRvr2IIBhdcIVH6M5NDp7Dv4fSqrXRvuJbNEChThRyp2QaGcBIwM6';

        if ($clientId !== $validClientId || $clientSecret !== $validClientSecret) {
            return response()->json(['message' => 'Unauthorized', 'error_code' => '401'], 401);
        }

        return $next($request);
    }
}
