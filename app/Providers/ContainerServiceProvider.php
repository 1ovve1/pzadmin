<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use App\Repositories\Auth\User\UserRepositoryInterface;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Server\ServerRepositoryInterface;
use App\Services\Abstract\ServiceFactoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Player\PlayerServiceInterface;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindManyServices([
            ZomboidServiceInterface::class,
            AuthServiceInterface::class,
            PlayerServiceInterface::class,
        ]);

        $this->bindManyRepositories([
            ServerRepositoryInterface::class,
            PlayerRepositoryInterface::class,
            UserRepositoryInterface::class,
        ]);
    }

    /**
     * @param  array<string>  $services
     */
    public function bindManyServices(array $services): void
    {
        foreach ($services as $service) {
            $this->bindService($service);
        }
    }

    public function bindManyRepositories(array $repositories): void
    {
        foreach ($repositories as $repositoryInterfaceName) {
            $this->bindRepository($repositoryInterfaceName);
        }
    }

    /**
     * @param  string  $serviceInterfaceName  - service interface name
     */
    public function bindService(string $serviceInterfaceName): void
    {
        $serviceFactoryClassName = str_replace('Interface', 'Factory', $serviceInterfaceName);
        /** @var ServiceFactoryInterface $serviceFactory */
        $serviceFactory = new $serviceFactoryClassName;

        $this->app->bind($serviceInterfaceName, fn () => $serviceFactory->get());
    }

    /**
     * @param  string  $repositoryInterfaceName  - repository interface name
     */
    public function bindRepository(string $repositoryInterfaceName): void
    {
        $repositoryFactoryClassName = str_replace('Interface', 'Factory', $repositoryInterfaceName);
        /** @var RepositoryFactoryInterface $repositoryFactory */
        $repositoryFactory = new $repositoryFactoryClassName;

        $this->app->bind($repositoryInterfaceName, fn () => $repositoryFactory->get());
    }
}
