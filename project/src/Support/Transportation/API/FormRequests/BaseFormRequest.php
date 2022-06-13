<?php

namespace Support\Transportation\API\FormRequests;

use Support\DTOs\BaseDTO;
use Support\Filters\BaseFilter;

interface BaseFormRequest
{
    public function data(BaseDTO $dto, BaseFilter $filter = null): BaseDTO;
}
