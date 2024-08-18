<?php

declare(strict_types=1);

namespace App\Repositories\Player;

use App\Data\PlayerData;
use App\Models\Player;
use App\Models\Server;
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
