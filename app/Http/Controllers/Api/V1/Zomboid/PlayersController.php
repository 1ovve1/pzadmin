<?php

namespace App\Http\Controllers\Api\V1\Zomboid;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Services\Player\PlayerServiceInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

class PlayersController extends Controller
{
    public function __construct(
        readonly private PlayerServiceInterface $playerService
    ) {}

    public function index(): Response
    {
        $pagination = $this->playerService->getAllPlayersWithPagination();

        return $this->json($pagination);
    }
}
