<?php

namespace Support\Listeners\External;

use Support\Exceptions\InternalException;
use Support\Repositories\FullTextSearchRepository\BaseFullTextSearchRepository;

class SearchIndexingListener
{
    public function __construct(
        protected BaseFullTextSearchRepository $repository,
        protected string                       $indexType = 'add')
    {
    }

    /**
     * @throws InternalException
     */
    public function handle(array $eventPayload): void
    {
        if (!method_exists($this->repository, $this->indexType)) throw new InternalException();

        if (!isset($eventPayload['event_body'])) throw new InternalException();

        $eventBody = $eventPayload['event_body'];

        $this->repository->{$this->indexType}($eventBody);
    }
}
