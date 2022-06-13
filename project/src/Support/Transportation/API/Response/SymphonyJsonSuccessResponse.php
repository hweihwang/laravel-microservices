<?php

namespace Support\Transportation\API\Response;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Support\Filters\BaseFilter;
use Support\Transportation\API\Paging\BasePaging;

class SymphonyJsonSuccessResponse implements SuccessResponse
{
    protected mixed $data;

    protected ?BaseFilter $filter = null;

    protected ?BasePaging $paging = null;

    /**
     * @return mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return SymphonyJsonSuccessResponse
     */
    public function setData(mixed $data): SymphonyJsonSuccessResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return BaseFilter|null
     */
    public function getFilter(): ?BaseFilter
    {
        return $this->filter;
    }

    /**
     * @param BaseFilter|null $filter
     * @return SymphonyJsonSuccessResponse
     */
    public function setFilter(?BaseFilter $filter): SymphonyJsonSuccessResponse
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return BasePaging|null
     */
    public function getPaging(): ?BasePaging
    {
        return $this->paging;
    }

    /**
     * @param BasePaging|null $paging
     * @return SymphonyJsonSuccessResponse
     */
    public function setPaging(?BasePaging $paging): SymphonyJsonSuccessResponse
    {
        $this->paging = $paging;
        return $this;
    }

    public function response(): JsonResponse
    {
        if ($this->data instanceof Paginator) {
            return self::fromPaginator($this->data, $this->paging, $this->filter);
        }

        if ($this->data instanceof ResourceCollection) {
            return self::fromResourceCollection($this->data, $this->paging, $this->filter);
        }

        return static::fromRaw($this->data);
    }

    public static function fromPaginator(Paginator $paginatedData, BasePaging $paging, BaseFilter $filter): JsonResponse
    {
        $response = [];

        $response['data'] = $paginatedData->items();

        if (!empty($paging)) {
            $response['paging'] = $paging->fromPaginator($paginatedData)->toArray();
        }

        if (!empty($filter)) {
            $response['filter'] = $filter->toArray();
        }

        return response()->json($response);
    }

    public static function fromResourceCollection(ResourceCollection $collection, BasePaging $paging, BaseFilter $filter): JsonResponse
    {
        return static::fromPaginator($collection->resource, $paging, $filter);
    }

    public static function fromRaw(mixed $data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ]);
    }
}
