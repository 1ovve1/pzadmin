<?php

declare(strict_types=1);

namespace App\Repositories\Player;

use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

interface PlayerRepositoryInterface extends RepositoryInterface
{
    public function allWithPagination(): Paginator;
}
