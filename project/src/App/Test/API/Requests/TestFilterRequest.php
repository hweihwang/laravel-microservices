<?php

namespace App\Test\API\Requests;

use Module\Test\DTOs\BaseTestFilterDTO;
use Support\DTOs\BaseDTO;
use Support\Filters\BaseFilter;
use Support\Transportation\API\FormRequests\SymphonyFormRequest;

class TestFilterRequest extends SymphonyFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filters' => 'array',
            'perPage' => 'integer',
            'page' => 'integer',
            'pageName' => 'string',
            'search' => 'string',
            'columns' => 'array',
            'orderBy' => 'string',
            'direction' => 'string',
        ];
    }

    public function data(BaseDTO $dto, BaseFilter $filter = null): BaseDTO
    {
        $data = $this->validated();

        isset($data['filters']) && !empty($data['filters']) ? $data['filters'] = $filter->fromArray($data['filters']) :
            $data['filters'] = $filter->fromArray([]);

        return $dto->fromArray($data);
    }
}
