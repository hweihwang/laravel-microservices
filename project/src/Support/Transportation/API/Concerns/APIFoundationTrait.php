<?php

declare(strict_types=1);

namespace Support\Transportation\API\Concerns;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Support\Filters\BaseFilter;
use Support\Transportation\API\Paging\BasePaging;
use Support\Transportation\API\Response\ErrorResponse;
use Support\Transportation\API\Response\SuccessResponse;

trait APIFoundationTrait
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(
        mixed       $data,
        ?BasePaging $paging = null,
        ?BaseFilter $filter = null
    ): JsonResponse
    {
        return app(SuccessResponse::class)
            ->setData($data)
            ->setPaging($paging)
            ->setFilter($filter)
            ->response();
    }

    public function error(
        string $message,
        string $key,
        int    $statusCode): JsonResponse
    {
        return app(ErrorResponse::class)
            ->setMessage($message)
            ->setKey($key)
            ->setStatusCode($statusCode)
            ->response();
    }

//    public function index(
//        BaseFilter      $filter,
//        BaseFormRequest $request,
//        BaseDTO         $dto,
//        BaseService     $service,
//    ): JsonResponse
//    {
//        $data = $request->data($dto, $filter);
//
//        return response()->json($service->execute($data));
//    }
}
