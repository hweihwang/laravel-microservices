<?php

namespace Module\Test\Repositories\ORMRepository;

use Module\Test\Models\Test;
use Module\Test\Repositories\TestRepository;
use Support\Repositories\ORMRepository\EloquentRepository;

class EloquentTestRepository extends EloquentRepository implements TestRepository
{
    public function __construct(Test $model)
    {
        $this->model = $model;
    }
}
