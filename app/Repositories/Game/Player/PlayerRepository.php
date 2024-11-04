<?php

declare(strict_types=1);

namespace App\Repositories\Game\Player;

use App\Data\Game\PlayerData;
use App\Models\Game\Player;
use App\Repositories\Abstract\AbstractRepository;
use Illuminate\Contracts\Pagination\Paginator;

class PlayerRepository extends AbstractRepository implements PlayerRepositoryInterface
{
    public function allWithPagination(): Paginator
    {
        $players = Player::paginate();

        return PlayerData::collect($players);
    }
}
