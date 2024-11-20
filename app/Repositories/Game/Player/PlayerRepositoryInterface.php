<?php

declare(strict_types=1);

namespace App\Repositories\Game\Player;

use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;

interface PlayerRepositoryInterface extends RepositoryInterface
{
    public function allWithPagination(): AbstractPaginator;
}
