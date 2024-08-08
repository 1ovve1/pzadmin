<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Servers;

use App\Enums\ServerEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Servers\Zomboid\ZomboidServerResource;
use App\Models\Server;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ZomboidController extends Controller
{
    public function __construct(
        readonly private ZomboidServiceInterface $zomboidService
    )
    {
    }

    public function index(): JsonResource
    {
        $server = Server::server(ServerEnum::ZOMBOID)->first();

        return ZomboidServerResource::make($server);
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
