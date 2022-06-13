<?php

namespace Module\Test\Repositories\FullTextSearchRepository;

use Module\Test\Models\Test;
use Module\Test\Repositories\TestRepository;
use Support\Repositories\FullTextSearchRepository\ElasticsearchRepository;

class ElasticsearchTestRepository extends ElasticsearchRepository implements TestRepository
{
    public function __construct(Test $model)
    {
        $this->model = $model;
    }
}
