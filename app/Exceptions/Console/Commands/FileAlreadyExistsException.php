<?php

namespace App\Exceptions\Console\Commands;

use App\Exceptions\CheckedException;

class FileAlreadyExistsException extends CheckedException
{
    protected string $messageFormat = "File '%s' already exists exception";

    public function __construct(string $fileName)
    {
        parent::__construct($this->formatMessage($fileName));
    }
}
