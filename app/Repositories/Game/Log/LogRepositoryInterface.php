<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log;

use App\Data\Game\LogData;
use App\Data\Game\LogInstanceData;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceNotFoundException;
use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Support\Collection;

interface LogRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Collection<LogData>
     */
    public function all(): Collection;

    /**
     * @return Collection<LogData>
     */
    public function allByInstance(LogInstanceData $logInstanceData): Collection;

    /**
     * Save log instance data and return difference
     *
     * @param  Collection<LogData>  $logDataCollection
     * @return Collection<LogData> - new logs records that was saved
     */
    public function save(LogInstanceData $logInstanceData, Collection $logDataCollection): Collection;

    /**
     * Reset all logs
     *
     * @throws LogInstanceNotFoundException
     */
    public function reset(LogInstanceData $logInstanceData): void;
}
