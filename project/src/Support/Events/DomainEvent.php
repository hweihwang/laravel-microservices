<?php

namespace Support\Events;

interface DomainEvent
{
    public function getEventId();

    public function getEventBody();

    public function getEventTime();

    public function getEventType();

    public function getEventVersion();
}
