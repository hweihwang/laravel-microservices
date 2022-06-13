<?php

namespace Support\PubSub;

use Support\Events\DomainEvent;

class NotificationService
{
    public function __construct()
    {
    }

    public function publish(string $exchangeName, DomainEvent $event, MessageProducer $messageProducer): DomainEvent
    {
        $messageProducer->send(
            $exchangeName,
            $event->getEventBody(),
            $event->getEventType(),
            $event->getEventId(),
            $event->getEventTime(),
            $event->getEventVersion(),
        );

        return $event;
    }
}
