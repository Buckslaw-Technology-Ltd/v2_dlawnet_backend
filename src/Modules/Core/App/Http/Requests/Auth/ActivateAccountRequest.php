<?php

namespace Modules\Core\App\Http\Requests\Auth;


use Modules\Core\App\Http\Requests\BaseRequest;

class ActivateAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'code' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code' => 'Invalid Request.',
        ];
    }


}
