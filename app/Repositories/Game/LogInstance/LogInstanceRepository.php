<?php

declare(strict_types=1);

namespace App\Repositories\Game\LogInstance;

use App\Data\Game\LogInstanceData;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceAlreadyExistsException;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceNotFoundException;
use App\Models\Game\LogInstance;
use App\Repositories\Abstract\AbstractRepository;
use RuntimeException;

class LogInstanceRepository extends AbstractRepository implements LogInstanceRepositoryInterface
{
    public function findOrCreate(LogInstanceEnum $logInstanceEnum): LogInstanceData
    {
        try {
            $logInstance = $this->find($logInstanceEnum);
        } catch (LogInstanceNotFoundException $e) {
            try {
                $logInstance = $this->create($logInstanceEnum);
            } catch (LogInstanceAlreadyExistsException $e) {
                throw new RuntimeException;
            }
        }

        return LogInstanceData::from($logInstance);
    }

    public function create(LogInstanceEnum $logInstanceEnum): LogInstanceData
    {
        try {
            LogInstance::fromLogInstanceEnum($logInstanceEnum);

            throw new LogInstanceAlreadyExistsException($logInstanceEnum);
        } catch (LogInstanceNotFoundException) {
            $logInstance = LogInstance::create([
                'name' => $logInstanceEnum,
                'checksum' => $logInstanceEnum->checksum(),
            ]);
        }

        return LogInstanceData::from($logInstance);
    }

    public function find(LogInstanceEnum $logInstanceEnum): LogInstanceData
    {
        $logInstance = LogInstance::fromLogInstanceEnum($logInstanceEnum);

        return LogInstanceData::from($logInstance);
    }
}
