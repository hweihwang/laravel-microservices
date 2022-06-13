<?php

namespace Support\Exceptions;

use Support\Transportation\API\Concerns\APIFoundationTrait;

class InvalidRequestException extends InternalException
{
    use APIFoundationTrait;

    private function __construct()
    {
        parent::__construct();
    }

    public static function create(array $errors = []): self
    {
        $static = new static();

        $static->errors = $errors;

        return $static;
    }

    const KEY = 'ERROR_INVALID_REQUEST';

    protected string $log = '';

    const STATUS_CODE = 422;

    const MESSAGE = 'Request is invalid';

    protected array $errors = [];
}
