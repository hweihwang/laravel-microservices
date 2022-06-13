<?php

namespace Support\Repositories\FullTextSearchRepository;

use Support\Events\External\SearchAndPublishableEvent;
use Support\Repositories\EventRepository;

class ElasticsearchEventRepository extends ElasticsearchRepository implements EventRepository
{
    public function __construct(SearchAndPublishableEvent $model)
    {
        $this->model = $model;
    }
}
