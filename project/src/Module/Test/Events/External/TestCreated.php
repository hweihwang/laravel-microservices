<?php

namespace Module\Test\Events\External;

use Support\Events\External\SearchAndPublishableEvent;

class TestCreated extends SearchAndPublishableEvent
{
    protected string $eventType = 'TestCreated';
}
