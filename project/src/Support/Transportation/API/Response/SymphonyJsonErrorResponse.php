<?php

namespace Support\Transportation\API\Response;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Support\Filters\BaseFilter;
use Support\Transportation\API\Paging\BasePaging;

class SymphonyJsonErrorResponse implements ErrorResponse
{
    protected string $message;

    protected string $key;

    protected int $statusCode;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return SymphonyJsonErrorResponse
     */
    public function setMessage(string $message): SymphonyJsonErrorResponse
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return SymphonyJsonErrorResponse
     */
    public function setKey(string $key): SymphonyJsonErrorResponse
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return SymphonyJsonErrorResponse
     */
    public function setStatusCode(int $statusCode): SymphonyJsonErrorResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        return response()->json([
            'key' => $this->key,
            'message' => $this->message,
        ], $this->statusCode);
    }
}
