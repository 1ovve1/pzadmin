<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands\Files\Stub;

enum StubKeywordEnum: string
{
    case CLASSNAME = 'classname';
    case EXTEND_CLASSNAME = 'extend_classname';

    case IMPLEMENT_CLASSNAME = 'implement_classname';
    case NAMESPACE = 'namespace';
    case EXTEND_USE = 'extend_use';
    case NEW_CLASSNAME = 'new_classname';
    case RETURN_TYPE = 'return_type';

    public function getReg(): string
    {
        return "/{{\s*{$this->value}\s*}}/m";
    }
}
