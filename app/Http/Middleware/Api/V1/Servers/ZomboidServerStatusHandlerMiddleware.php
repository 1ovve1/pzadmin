<?php

namespace App\Http\Middleware\Api\V1\Servers;

use App\Events\Servers\Zomboid\StatusEvent as ZomboidStatusEvent;
use App\Services\Zomboid\ZomboidServiceInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class ZomboidServerStatusHandlerMiddleware
{
    public function __construct(
        private ZomboidServiceInterface $zomboidService
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $serverStatus = $this->zomboidService->getsStatus();
        ZomboidStatusEvent::dispatch($serverStatus);

        return $response;
    }
}
