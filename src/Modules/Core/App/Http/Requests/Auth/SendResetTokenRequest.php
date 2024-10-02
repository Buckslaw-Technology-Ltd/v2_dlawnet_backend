<?php

namespace Modules\Core\App\Http\Requests\Auth;


use Modules\Core\App\Http\Requests\BaseRequest;

class SendResetTokenRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'Email not found',
        ];
    }
}
