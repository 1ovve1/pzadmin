<?php

declare(strict_types=1);

namespace App\Services\Abstract;

interface ServiceFactoryInterface
{
    /**
     * Return service instance
     */
    public function get(): Object;
}
