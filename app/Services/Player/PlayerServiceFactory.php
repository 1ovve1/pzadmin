<?php

declare(strict_types=1);

namespace App\Services\Player;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;


class PlayerServiceFactory implements ServiceFactoryInterface
{
    function get(): PlayerServiceInterface
    {
        return App::make(PlayerService::class);
    }
}
