<?php

return [
    'driver' => env('ZOMBOID_DRIVER', 'default'),

    'servers' => [
        'default' => [
            'ip' => env('ZOMBOID_IP', 'none'),
            'port' => env('ZOMBOID_PORT_1', env('ZOMBOID_PORT_2', 'none'))
        ]
    ]
];
