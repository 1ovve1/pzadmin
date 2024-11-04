<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class LogRepositoryFactory implements RepositoryFactoryInterface
{
    public function getDatabase(): LogRepositoryInterface
    {
        return App::make(DatabaseLogRepository::class);
    }

    public function getFilesystem(): LogRepositoryInterface
    {
        return App::make(FilesystemLogRepository::class);
    }

    public function get(): LogRepositoryInterface
    {
        return $this->getDatabase();
    }
}
