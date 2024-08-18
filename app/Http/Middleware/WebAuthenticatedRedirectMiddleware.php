<?php

namespace App\Http\Middleware;

use App\Services\Auth\AuthServiceInterface;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebAuthenticatedRedirectMiddleware
{
    public function __construct(
        readonly private AuthServiceInterface $authService
    )
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $this->authService->authenticated();

            return $next($request);
        } catch (AuthenticationException $e) {

            return redirect(route('login'));
        }
    }
}
