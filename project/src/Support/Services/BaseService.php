<?php

namespace Support\Services;

use Support\DTOs\BaseDTO;

interface BaseService
{
    public function execute(BaseDTO $dto);
}
