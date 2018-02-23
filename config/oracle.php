<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'host'          => env('DB_HOST_ORACLE', ''),
        'port'          => env('DB_PORT_ORACLE', '1521'),
        'database'          => env('DB_DATABASE_ORACLE', '1521'),
        'service_name'          => env('DB_SERVICE_NAME_ORACLE', ''),
        'username'      => env('DB_USERNAME_ORACLE', ''),
        'password'      => env('DB_PASSWORD_ORACLE', ''),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),

    ],
];