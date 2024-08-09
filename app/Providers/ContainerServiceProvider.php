<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Abstract\ServiceFactoryInterface;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindMany6Services([
            ZomboidServiceInterface::class,
        ]);
    }

    /**
     * @param  array<string>  $services
     */
    public function bindMany6Services(array $services): void
    {
        foreach ($services as $service) {
            $this->bindService($service);
        }
    }

    /**
     * @param  string  $serviceInterface  - service factory class name
     */
    public function bindService(string $serviceInterface): void
    {
        $serviceFactoryClassName = str_replace('Interface', 'Factory', $serviceInterface);
        /** @var ServiceFactoryInterface $serviceFactory */
        $serviceFactory = new $serviceFactoryClassName;

        $this->app->bind($serviceInterface, fn () => $serviceFactory->get());
    }
}
