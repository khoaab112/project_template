<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as IlluminateRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class FormRequest extends IlluminateRequest
{
    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_BAD_REQUEST;

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    protected function errorMessage()
    {
        $message = '';

        switch (request()->getMethod()) {
            case 'PUT':
                $message = __('response.update_failed');
                break;
            case 'POST':
                $message = __('response.store_failed');
                break;
        }

        return $message;
    }

    /**
     * Handle a failed validation attempt.
     * Override to control the 422 redirection upon validation failure
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => config('env.response.failed'),
                'message' => $this->errorMessage(),
                'data' => $validator->errors()
            ], $this->statusCode)
        );
    }
}
