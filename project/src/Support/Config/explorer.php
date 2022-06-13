<?php

declare(strict_types=1);

use Module\Test\Models\Test;
use Support\Events\External\SearchAndPublishableEvent;

return [
    /*
     * There are different options for the connection. Since Explorer uses the Elasticsearch PHP SDK
     * under the hood, all the host configuration options of the SDK are applicable here. See
     * https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/configuration.html
     */
    'connection' => [
        'host' => env('ELASTIC_HOST', 'localhost'),
        'port' => env('ELASTIC_PORT', 9200),
        'scheme' => env('ELASTIC_SCHEME', 'http'),
    ],

    'auth' => [
        'username' => env('ELASTIC_USERNAME', ''),
        'password' => env('ELASTIC_PASSWORD', ''),
    ],

    'ssl_verification' => env('ELASTIC_SSL_VERIFICATION', false),

    /**
     * An index may be defined on an Eloquent model or inline below. A more in depth explanation
     * of the mapping possibilities can be found in the documentation of Explorer's repository.
     */
    'indexes' => [
        Test::class,
        SearchAndPublishableEvent::class,
        \App\NiceSpace\Models\Product::class
    ],

    /**
     * You may opt to keep the old indices after the alias is pointed to a new index.
     * A model is only using index aliases if it implements the Aliased interface.
     */
    'prune_old_aliases' => true,
];
