<?php

declare(strict_types=1);

namespace App\Services\Player;

use App\Repositories\Player\PlayerRepositoryInterface;
use App\Services\Abstract\AbstractService;
use Illuminate\Contracts\Pagination\Paginator;

class PlayerService extends AbstractService implements PlayerServiceInterface
{
    public function __construct(
        readonly protected PlayerRepositoryInterface $playerRepository
    ) {}

    public function getAllPlayersWithPagination(): Paginator
    {
        return $this->playerRepository->allWithPagination();
    }
}
