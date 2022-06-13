<?php

namespace App\Test\API\Controllers;

use App\Test\API\Requests\TestFilterRequest;
use App\Test\API\Requests\TestStoreRequest;
use Illuminate\Http\JsonResponse;
use Module\Test\DTOs\BaseTestFilterDTO;
use Module\Test\DTOs\BaseTestStoreDTO;
use Module\Test\Filters\BaseTestFilter;
use Module\Test\Services\BaseTestFilterService;
use Module\Test\Services\BaseTestStoreService;
use Support\Transportation\API\APIController;
use Support\Transportation\API\Paging\BasePaging;

class TestController extends APIController
{
    public function index(
        BaseTestFilter        $filter,
        BasePaging            $paging,
        TestFilterRequest  $request,
        BaseTestFilterDTO     $dto,
        BaseTestFilterService $service,
    ): JsonResponse
    {
        $data = $request->data($dto, $filter);

        return $this->success($service->execute($data), $paging, $filter);
    }

    public function show(int $id)
    {

    }

    public function store(
        TestStoreRequest     $request,
        BaseTestStoreDTO     $dto,
        BaseTestStoreService $service,
    ): JsonResponse
    {
        $data = $request->data($dto);

        return $this->success($service->execute($data));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
