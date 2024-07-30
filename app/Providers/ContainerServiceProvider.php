<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       $this->bindMany6Services([
           ZomboidServiceInterface::class
       ]);
    }

    /**
     * @param array<string> $services
     * @return void
     */
    public function bindMany6Services(array $services): void
    {
        foreach ($services as $service) {
            $this->bindService($service);
        }
    }

    /**
     * @param string $serviceInterface - service factory class name
     * @return void
     */
    public function bindService(string $serviceInterface): void
    {
        $serviceFactoryClassName = str_replace("Interface", "Factory", $serviceInterface);
        $serviceFactory = new $serviceFactoryClassName();

        $this->app->bind($serviceInterface, fn() => $serviceFactory->get());
    }
}
