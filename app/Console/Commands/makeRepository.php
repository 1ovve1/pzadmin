<?php

namespace App\Console\Commands;

use App\Console\Abstract\Commands\AbstractMakeFilesCommand;
use App\Console\Commands\Actions\Repository\CreateRepositoryFactoryFileAction;
use App\Console\Commands\Actions\Repository\CreateRepositoryFileAction;
use App\Console\Commands\Actions\Repository\CreateRepositoryInterfaceFileAction;
use App\Console\Commands\Files\Repository\RepositoryFactoryStub;
use App\Console\Commands\Files\Repository\RepositoryInterfaceStub;
use App\Console\Commands\Files\Repository\RepositoryStub;

class makeRepository extends AbstractMakeFilesCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create named repository';

    function getActions(string $argument): array
    {
        return [
            new CreateRepositoryInterfaceFileAction(new RepositoryInterfaceStub, $argument),
            new CreateRepositoryFileAction(new RepositoryStub, $argument),
            new CreateRepositoryFactoryFileAction(new RepositoryFactoryStub, $argument),
        ];
    }
}
