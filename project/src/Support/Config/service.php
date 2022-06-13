<?php

return [
    'name' => env('SERVICE_NAME', 'BaseService'),
    'apps' => [
        'test' => [
            'base_uri' => env('SERVICE_TEST_BASE_API', 'test/test/api'),
        ],
    ],
];
