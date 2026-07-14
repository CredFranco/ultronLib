<?php

return [
    'ultron' => [
        'url' => env('URL_SERVICE_ULTRON'),
        'key' => env('ULTRON_KEY'),
    ],
    'jarvis' => [
        'url' => env('MANAGEMENT_URL'),
    ],
    'atlas' => [
        'url' => env('ATLAS_URL'),
        'client_token' => env('ATLAS_CLIENT_TOKEN'),
    ],
];
