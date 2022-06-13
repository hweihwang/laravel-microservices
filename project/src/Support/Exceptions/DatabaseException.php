<?php

namespace Support\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Support\Transportation\API\Concerns\APIFoundationTrait;

class DatabaseException extends InternalException
{
    use APIFoundationTrait;

    private function __construct()
    {
        parent::__construct();
    }

    public static function create(string $entity): self
    {
        $static = new static();

        $static->entity = $entity;

        return $static;
    }

    const KEY = 'ERROR_DATABASE';

    protected string $log = '';

    const STATUS_CODE = 400;

    const MESSAGE = 'Something went wrong with the database';

    public function message(): string
    {
        return sprintf(self::MESSAGE, $this->entity);
    }

    protected string $entity = '';

    public function render(): JsonResponse
    {
        return $this->error(
            __($this->message()),
            static::KEY,
            static::STATUS_CODE
        );
    }
}
