<?php

namespace Support\PubSub;

use Support\Events\DomainEvent;

interface DomainEventSubscriber
{
    public function handle(DomainEvent $event);

    public function isSubscribedTo(DomainEvent $event): bool;
}
