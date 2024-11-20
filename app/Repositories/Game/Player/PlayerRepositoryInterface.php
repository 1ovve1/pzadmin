<?php

declare(strict_types=1);

namespace App\Repositories\Game\Player;

use App\Data\Game\PlayerData;
use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Pagination\AbstractPaginator;

interface PlayerRepositoryInterface extends RepositoryInterface
{
    /**
     * @return AbstractPaginator<PlayerData>
     */
    public function allWithPagination(): AbstractPaginator;
}
