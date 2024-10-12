<?php

namespace Modules\Bank\App\Http\Requests;

use Modules\Core\App\Http\Requests\BaseRequest;

class CreateTransactionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:0|max:99999999.9999',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a valid number.',
        ];
    }
}
