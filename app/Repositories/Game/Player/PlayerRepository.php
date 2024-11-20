<?php

declare(strict_types=1);

namespace App\Repositories\Game\Player;

use App\Data\Game\PlayerData;
use App\Models\Game\Player;
use App\Repositories\Abstract\AbstractRepository;
use Illuminate\Pagination\AbstractPaginator;

class PlayerRepository extends AbstractRepository implements PlayerRepositoryInterface
{
    public function allWithPagination(): AbstractPaginator
    {
        $players = Player::paginate();

        return PlayerData::collect($players);
    }
}
