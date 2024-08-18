<?php

declare(strict_types=1);

namespace App\Services\Player;

use Illuminate\Contracts\Pagination\Paginator;

interface PlayerServiceInterface
{
    function getAllPlayersWithPagination(): Paginator;
}
