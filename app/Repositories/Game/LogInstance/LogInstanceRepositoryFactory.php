<?php

declare(strict_types=1);

namespace App\Repositories\Game\LogInstance;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class LogInstanceRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): LogInstanceRepositoryInterface
    {
        return App::make(LogInstanceRepository::class);
    }
}
