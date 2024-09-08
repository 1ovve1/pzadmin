<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Zomboid;

use App\Data\ServerData;
use App\Http\Controllers\Controller;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly final class ZomboidController extends Controller
{
    public function __construct(
        private ZomboidServiceInterface $zomboidService
    ) {}

    public function index(): Response
    {
        return $this->json($this->zomboidService->getServer());
    }

    public function start(): Response
    {
        $this->zomboidService->doStart();

        return $this->accepted();
    }

    public function down(): Response
    {
        $this->zomboidService->doDown();

        return $this->accepted();
    }

    public function restart(): Response
    {
        $this->zomboidService->doRestart();

        return $this->accepted();
    }
}
