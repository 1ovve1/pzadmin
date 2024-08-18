<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands;

use App\Console\Abstract\Commands\Action\AbstractCreateFileAction;
use App\Exceptions\Console\Commands\FileAlreadyExistsException;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

abstract class AbstractMakeFilesCommand extends Command
{
    /**
     * @return AbstractCreateFileAction[]
     */
    abstract public function getActions(string $argument): array;

    public function handle(): ?bool
    {
        $argument = $this->argument('name');

        foreach ($this->getActions($argument) as $action) {
            try {
                $fileDestination = $action->create();

                $this->components->info(sprintf('%s [%s] created successfully.', $action->className, $fileDestination));
            } catch (FileAlreadyExistsException $e) {
                $this->components->error($action->classPath.' already exists.');
            } catch (FileNotFoundException $e) {
                $this->components->error($action->stub->getStubPath().' stub was not founded.');
            }

        }

        return true;
    }
}
