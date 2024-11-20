<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser\Drivers;

interface ParserDriverInterface
{
    /**
     * string template with params like:
     * "@variable_example@ and regular string values here"
     */
    public function template(): string;

    /**
     * callbacks that represent template_var_name => callback
     *
     * @return array<string, callable(string=): (string|array<string>)>
     */
    public function formatters(): array;
}
