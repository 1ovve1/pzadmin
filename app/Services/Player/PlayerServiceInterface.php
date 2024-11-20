<?php

declare(strict_types=1);

namespace App\Services\Player;

use App\Data\Game\PlayerData;
use Illuminate\Pagination\AbstractPaginator;

interface PlayerServiceInterface
{
    /**
     * @return AbstractPaginator<PlayerData>
     */
    public function getAllPlayersWithPagination(): AbstractPaginator;
}
