<?php

namespace App\Http\Controllers\Api\V1\Zomboid;

use App\Http\Controllers\Controller;
use App\Services\Player\PlayerServiceInterface;
use Symfony\Component\HttpFoundation\Response;

readonly final class PlayersController extends Controller
{
    public function __construct(
        private PlayerServiceInterface $playerService
    ) {}

    public function index(): Response
    {
        $pagination = $this->playerService->getAllPlayersWithPagination();

        return $this->json($pagination);
    }
}
