<?php

namespace Module\Test\Services;

use Module\Test\Events\External\TestCreated;
use Module\Test\Repositories\TestRepository;
use Support\DTOs\BaseDTO;

class TestStoreService implements BaseTestFilterService
{
    public function __construct(private readonly TestRepository $testRepository)
    {
    }

    /**
     */
    public function execute(BaseDTO $dto)
    {
        try {
            $model = $this->testRepository->add($dto->toArray());

//            event(new TestCreated($model));

            TestCreated::publish($model->toArray());

            return $model;
        } catch (\Exception $e) {
//            throw CreateEntityException::create(
//                $this->testRepository->getModelShortClass()
//            );
            echo($e->getMessage());
        }
    }
}
