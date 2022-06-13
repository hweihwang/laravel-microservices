<?php

namespace Support\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Support\Transportation\API\Concerns\APIFoundationTrait;

class InternalException extends Exception
{
    use APIFoundationTrait;

    const KEY = 'ERROR_INTERNAL'; // Custom key for the exception

    //Could be stack trace or full error messages that send to devs
    protected string $log = '';

    const STATUS_CODE = 500;

    const MESSAGE = 'An unexpected error occurred';

    public function render(): JsonResponse
    {
        //$this->log = $this->getTraceAsString();
        //TODO: Check permissions, do some logs, etc.
        Log::error($this->getTraceAsString());

        return $this->error(
            __(static::MESSAGE),
            static::KEY,
            static::STATUS_CODE
        );
    }
}
