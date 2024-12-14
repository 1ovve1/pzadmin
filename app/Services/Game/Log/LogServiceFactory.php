<?php

declare(strict_types=1);

namespace App\Services\Game\Log;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;

class LogServiceFactory implements ServiceFactoryInterface
{
    public function get(): LogServiceInterface
    {
        return App::make(LogService::class);
    }
}
