<?php

declare(strict_types=1);

namespace App\Exceptions\Traits;

trait FormattedMessageTrait
{
    protected string $messageFormat = '';

    /**
     * @param int|string ...$args
     */
    protected function formatMessage(int|string ...$args): string
    {
        return vsprintf($this->messageFormat, $args);
    }

    protected function print(mixed $values): string
    {
        return print_r($values, true);
    }
}
