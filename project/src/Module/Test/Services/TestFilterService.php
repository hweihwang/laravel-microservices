<?php

namespace Module\Test\Services;

use Module\Test\Repositories\TestRepository;
use Support\DTOs\BaseDTO;

class TestFilterService implements BaseTestFilterService
{
    public function __construct(private readonly TestRepository $testRepository)
    {
    }

    public function execute(BaseDTO $dto)
    {
        return $this->testRepository->filterPaginated(
            filters: $dto->getFilters(),
            perPage: $dto->getPerPage(),
            page: $dto->getPage(),
            orderBy: $dto->getOrderBy(),
            direction: $dto->getDirection(),
            columns: $dto->getColumns(),
            pageName: $dto->getPageName(),
            search: $dto->getSearch(),
        );
    }
}
