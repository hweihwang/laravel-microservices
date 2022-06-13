<?php

namespace Module\Test\DTOs;

use Support\DTOs\BaseFilterDTO;

class TestFilterDTO extends BaseFilterDTO implements BaseTestFilterDTO
{
    protected array $columns = ['id', 'name', 'description', 'status'];
}
