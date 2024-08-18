<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Console\Abstract\Commands\AbstractMakeFilesCommand;
use App\Console\Commands\Actions\Service\CreateServiceFactoryFileAction;
use App\Console\Commands\Actions\Service\CreateServiceFileAction;
use App\Console\Commands\Actions\Service\CreateServiceInterfaceFileAction;
use App\Console\Commands\Files\Service\ServiceFactoryStub;
use App\Console\Commands\Files\Service\ServiceInterfaceStub;
use App\Console\Commands\Files\Service\ServiceStub;

class makeService extends AbstractMakeFilesCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create named service';

    public function getActions(string $argument): array
    {
        return [
            new CreateServiceFileAction(new ServiceStub, $argument),
            new CreateServiceInterfaceFileAction(new ServiceInterfaceStub, $argument),
            new CreateServiceFactoryFileAction(new ServiceFactoryStub, $argument),
        ];
    }
}
