<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Servers;

use App\Http\Controllers\Controller;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Http\JsonResponse;

class ZomboidController extends Controller
{
    public function __construct(
        readonly private ZomboidServiceInterface $zomboidService
    )
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(['status' => $this->zomboidService->getsStatus()]);
    }

    public function start(): JsonResponse
    {
        $this->zomboidService->doStart();

        return response()->json();
    }

    public function down(): JsonResponse
    {
        $this->zomboidService->doDown();

        return response()->json();
    }

    public function restart(): JsonResponse
    {
        $this->zomboidService->doRestart();

        return response()->json();
    }
}
