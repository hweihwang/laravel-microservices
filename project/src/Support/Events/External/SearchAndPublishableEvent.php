<?php

namespace Support\Events\External;

use Illuminate\Support\Str;
use RabbitEvents\Publisher\ShouldPublish;
use RabbitEvents\Publisher\Support\Publishable;
use Support\Events\DomainEvent;
use Support\Models\SearchableModel;

class SearchAndPublishableEvent extends SearchableModel implements DomainEvent, ShouldPublish
{
    use Publishable;

    protected string $eventId;

    protected string $eventType = 'Base';

    protected array $eventBody = [];

    protected int $eventTime;

    protected int $eventVersion = 1;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $eventBody = [], int $eventVersion = 1)
    {
        $this->eventId = Str::orderedUuid();
        $this->eventBody = $eventBody;
        $this->eventTime = time();
        $this->eventVersion = $eventVersion;
    }

    public function toSearchableArray(): array
    {
        return [
            'event_id' => $this->eventId,
            'event_type' => $this->eventType,
            'event_body' => $this->eventBody,
            'event_time' => $this->eventTime,
            'event_version' => $this->eventVersion,
        ];
    }

    public function searchableAs(): string
    {
        return 'events';
    }

    public function mappableAs(): array
    {
        return [
            'event_id' => 'keyword',
            'event_type' => 'text',
            'event_body' => 'text',
            'event_time' => 'date_nanos',
            'event_version' => 'long',
        ];
    }

    /**
     * @return array
     */
    public function toPublish(): array
    {
        return $this->toSearchableArray();
    }

    /**
     * @return string
     */
    public function publishEventKey(): string
    {
        return $this->getEventType();
    }

    public function getScoutKeyName(): string
    {
        return 'event_id';
    }

    public function getScoutKey(): string
    {
        return $this->eventId;
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     * @return SearchAndPublishableEvent
     */
    public function setEventId(string $eventId): self
    {
        $this->eventId = $eventId;

        return $this;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     * @return SearchAndPublishableEvent
     */
    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return array
     */
    public function getEventBody(): array
    {
        return $this->eventBody;
    }

    /**
     * @param array $eventBody
     * @return SearchAndPublishableEvent
     */
    public function setEventBody(array $eventBody): self
    {
        $this->eventBody = $eventBody;
        return $this;
    }

    /**
     * @return int
     */
    public function getEventTime(): int
    {
        return $this->eventTime;
    }

    /**
     * @param int $eventTime
     * @return SearchAndPublishableEvent
     */
    public function setEventTime(int $eventTime): self
    {
        $this->eventTime = $eventTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getEventVersion(): int
    {
        return $this->eventVersion;
    }

    /**
     * @param int $eventVersion
     * @return SearchAndPublishableEvent
     */
    public function setEventVersion(int $eventVersion): self
    {
        $this->eventVersion = $eventVersion;
        return $this;
    }
}
