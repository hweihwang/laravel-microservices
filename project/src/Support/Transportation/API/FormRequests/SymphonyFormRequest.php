<?php

namespace Support\Transportation\API\FormRequests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Support\Exceptions\InvalidRequestException;
use Support\Transportation\API\Concerns\APIFoundationTrait;

abstract class SymphonyFormRequest extends FormRequest implements BaseFormRequest
{
    use APIFoundationTrait;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws InvalidRequestException
     */
    public function failedValidation(Validator $validator)
    {
        throw InvalidRequestException::create($validator->errors()->all());
    }
}
