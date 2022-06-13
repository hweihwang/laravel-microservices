<?php

namespace Module\Test\Providers;

use Module\Test\Listeners\External\TestCreatedEventPersist;
use Module\Test\Listeners\External\TestCreatedIndex;
use RabbitEvents\Listener\ListenerServiceProvider;

class TestRabbitEventServiceProvider extends ListenerServiceProvider
{
    protected array $listen = [
        'TestCreated' => [
            TestCreatedIndex::class,
            TestCreatedEventPersist::class,
        ],
    ];
}
