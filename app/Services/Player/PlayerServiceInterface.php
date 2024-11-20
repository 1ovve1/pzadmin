<?php

declare(strict_types=1);

namespace App\Services\Player;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;

interface PlayerServiceInterface
{
    public function getAllPlayersWithPagination(): AbstractPaginator;
}
