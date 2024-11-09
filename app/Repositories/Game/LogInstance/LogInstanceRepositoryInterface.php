<?php

declare(strict_types=1);

namespace App\Repositories\Game\LogInstance;

use App\Data\Game\LogInstanceData;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceAlreadyExistsException;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceNotFoundException;
use App\Repositories\Abstract\RepositoryInterface;

interface LogInstanceRepositoryInterface extends RepositoryInterface
{
    public function findOrCreate(LogInstanceEnum $logInstanceEnum): LogInstanceData;

    /**
     * @throws LogInstanceAlreadyExistsException
     */
    public function create(LogInstanceEnum $logInstanceEnum): LogInstanceData;

    /**
     * @throws LogInstanceNotFoundException
     */
    public function find(LogInstanceEnum $logInstanceEnum): LogInstanceData;
}
