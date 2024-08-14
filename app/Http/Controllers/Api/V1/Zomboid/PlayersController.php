<?php

namespace App\Http\Controllers\Api\V1\Zomboid;

use App\Http\Controllers\Controller;
use App\Repositories\Player\PlayerRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class PlayersController extends Controller
{
    public function __construct(
        readonly private PlayerRepositoryInterface $playerRepository
    ) {}

    public function index(): Paginator
    {
        $playerDataCollection = $this->playerRepository->allWithPagination();

        return $playerDataCollection;
    }
}
