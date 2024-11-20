<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\Traits\FormattedMessageTrait;
use Exception;
use Throwable;

abstract class CheckedException extends Exception
{
    use FormattedMessageTrait;

    public function __construct(?string $message = null, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?? $this->messageFormat, $code, $previous);
    }
}
