<?php

namespace Support\Listeners\External;

use Support\Repositories\EventRepository;

class EventPersistentListener
{
    public function __construct(private readonly EventRepository $eventRepository)
    {

    }

    public function handle(array $eventPayload): void
    {
        $this->eventRepository->add($eventPayload);
    }
}
