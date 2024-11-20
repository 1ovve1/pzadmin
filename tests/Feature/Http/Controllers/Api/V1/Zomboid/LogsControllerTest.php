<?php

use App\Models\Auth\User;
use App\Models\Game\Log;
use App\Models\Game\LogInstance;
use App\Repositories\Game\Log\LogRepositoryFactory;
use App\Repositories\Game\Log\LogRepositoryInterface;
use App\Repositories\Game\Log\Parser\ParserFactoryInterface;
use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Illuminate\Database\Eloquent\Collection;
use Tests\Mock\Services\Logs\LogsParser\ParserFactoryMock;
use Tests\TestCase;

/**
 * @var TestCase $this
 * @var LogInstance $logInstance
 * @var Collection<LogInstance> $logs
 */
beforeEach(function () {
    $this->logInstance = LogInstance::factory()->create([
        'name' => LogInstanceEnum::SERVER_CONSOLE->name,
    ]);

    // for test with filesystem scenario
    $this->app->bind(ParserFactoryInterface::class, ParserFactoryMock::class);

    // for db tests
    $this->logs = Log::factory()->createMany([[
        'log_instance_id' => $this->logInstance->id,
        'type' => 'LOG',
        'scope' => 'Network',
        'message' => 'No UPnP-enabled Internet gateway found, you must configure port forwarding on your gateway manually in order to make your server accessible from the Internet.',
    ], [
        'log_instance_id' => $this->logInstance->id,
        'type' => 'LOG',
        'scope' => 'Network',
        'message' => 'Initialising Server Systems...',
    ]]);
});

/** @link \App\Http\Controllers\Api\V1\Zomboid\LogsController::console() */
test('test console with db log repository', function () {
    $this->app->bind(LogRepositoryInterface::class, fn () => (new LogRepositoryFactory)->getDatabase());

    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('v1.zomboid.logs.console'));

    $response->assertJson([
        'data' => [
            [
                'type' => 'LOG',
                'scope' => 'Network',
                'message' => 'No UPnP-enabled Internet gateway found, you must configure port forwarding on your gateway manually in order to make your server accessible from the Internet.',
            ],
            [
                'type' => 'LOG',
                'scope' => 'Network',
                'message' => 'Initialising Server Systems...',
            ],
        ],
    ])->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_OK);
});

/** @link \App\Http\Controllers\Api\V1\Zomboid\LogsController::console() */
test('test index with filesystem log repository', function () {
    $this->app->bind(LogRepositoryInterface::class, fn () => (new LogRepositoryFactory)->getFilesystem());

    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('v1.zomboid.logs.console'));

    $response->assertJson([
        'data' => [
            [
                'type' => 'LOG',
                'scope' => 'Network',
                'message' => 'No UPnP-enabled Internet gateway found, you must configure port forwarding on your gateway manually in order to make your server accessible from the Internet.',
            ],
            [
                'type' => 'LOG',
                'scope' => 'Network',
                'message' => 'Initialising Server Systems...',
            ],
        ],
    ])->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_OK);
});
