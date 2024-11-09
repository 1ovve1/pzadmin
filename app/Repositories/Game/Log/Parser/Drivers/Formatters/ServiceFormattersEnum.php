<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser\Drivers\Formatters;

enum ServiceFormattersEnum: string
{
    /**
     * Each special formatter for all parsed arguments
     */
    case EACH = 'each';
    /**
     * Ignoring arguments from result
     */
    case IGNORE = 'ignore';

    public function resolve(array $parsedLine, callable $formatterContext): array
    {
        switch ($this) {
            case self::EACH:
                return array_map($formatterContext, $parsedLine);
            case self::IGNORE:
                $keys = $formatterContext();

                if (is_string($keys)) {
                    $keys = [$keys];
                }

                return array_diff_key($parsedLine, array_flip($keys));

            default:
                return $parsedLine;
        }

    }
}
