<?php

declare(strict_types=1);

namespace App\Repositories\Abstract;

interface RepositoryFactoryInterface
{
    public function get(): RepositoryInterface;
}
