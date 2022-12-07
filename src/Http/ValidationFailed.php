<?php

namespace Prem\ResponseBuilder\Http;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Prem\ResponseBuilder\ResponseBuilder;

trait ValidationFailed
{
    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = ResponseBuilder::asError(config('api-response.validation_http_code'))
            ->when(config('api-response.show_validation_failed_message') === 'first', function ($builder) use ($validator) {
                return $builder->withMessage($validator->errors()->first());
            })
            ->when(config('api-response.show_validation_failed_message') === 'all', function ($builder) use ($validator) {
                return $builder->with('errors', $validator->errors());
            })
            ->build();

        throw new HttpResponseException($response);
    }
}
