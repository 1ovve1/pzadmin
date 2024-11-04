<?php

declare(strict_types=1);

namespace App\Services\Log;

use App\Data\Game\LogData;
use Illuminate\Support\Collection;

interface LogServiceInterface
{
    /**
     * @return Collection<LogData>
     */
    public function getServerConsoleLogs(): Collection;

    /**
     * @return Collection<LogData>
     */
    public function getServerConsoleLogsFromFilesystem(): Collection;

    /**
     * @param  Collection<LogData>  $logsInstancesData
     * @return Collection<LogData>
     */
    public function saveLogsInDatabase(Collection $logsInstancesData): Collection;

    /**
     * Reset all logs
     */
    public function resetLogsInDatabase(): void;
}
