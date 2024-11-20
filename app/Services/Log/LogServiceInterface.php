<?php

declare(strict_types=1);

namespace App\Services\Log;

use App\Data\Game\LogData;
use Illuminate\Support\Collection;

interface LogServiceInterface
{
    /**
     * @return Collection<int, LogData>
     */
    public function getServerConsoleLogs(): Collection;

    /**
     * @return Collection<int, LogData>
     */
    public function getServerConsoleLogsFromFilesystem(): Collection;

    /**
     * @param  Collection<int, LogData>  $logsInstancesData
     * @return Collection<int, LogData>
     */
    public function saveLogsInDatabase(Collection $logsInstancesData): Collection;

    /**
     * Reset all logs
     */
    public function resetLogsInDatabase(): void;
}
