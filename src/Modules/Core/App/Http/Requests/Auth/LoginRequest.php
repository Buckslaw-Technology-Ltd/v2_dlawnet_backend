<?php

namespace Modules\Core\App\Http\Requests\Auth;

use Modules\Core\App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'emailOrUsername' => 'required|string',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'Email address not recognised'
        ];
    }
}

