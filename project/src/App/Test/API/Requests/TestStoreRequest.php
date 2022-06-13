<?php

namespace App\Test\API\Requests;

use Module\Test\DTOs\BaseTestFilterDTO;
use Module\Test\DTOs\BaseTestStoreDTO;
use Support\DTOs\BaseDTO;
use Support\Filters\BaseFilter;
use Support\Transportation\API\FormRequests\SymphonyFormRequest;

class TestStoreRequest extends SymphonyFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'status' => 'integer',
        ];
    }

    public function data(BaseDTO $dto, BaseFilter $filter = null): BaseDTO
    {
        return $dto->fromArray($this->validated());
    }
}
